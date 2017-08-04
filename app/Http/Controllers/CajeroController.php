<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\CrearCajero;
use App\Http\Requests;
use App\Http\Requests\CajeroRequest;
use App\Cajero;
use App\User;
use Auth;
use Faker\Factory as Faker;

/**
 * Controlador CajeroController, CRUD de Cajeros
 */
class CajeroController extends Controller{

    /**
     * Solo el usuario con rol admin puede acceder a los métodos
     */
     public function __construct(){
       $this->middleware('role:admin');
    }

    /**
     * Redirige a la página de listado de cajeros
     * @return View Página de listado de cajeros
     */
    public function index(){
      $cajeros=Cajero::paginate(10);
      return view('panel.cajeros.index', compact('cajeros'));
    }

    /**
     * Redirige a la página para crear un cajero
     * @return View Página crear cajero
     */
    public function create(){
      $usuarios = User::with(['rol' => function ($query) {
          $query->where('name','cajero');
      }])->orderBy('name')->get();
      return view('panel.cajeros.create', compact('usuarios'));
    }

    /**
     * Registra un cajero y redirige a la ruta para listar cajeros
     * @param  CajeroRequest $request Atributos del Cajero
     * @return Redirect Ruta para lista cajeros
     */
    public function store(CajeroRequest $request){
      Cajero::create($request->all());
      $faker = Faker::create();
      $clave = $faker->regexify('[a-zA-Z0-9]{8}');
      User::updateOrCreate(['id'=>$request->iduser],['password'=>bcrypt($clave)]);
      $user=User::findOrFail($request->iduser);
      \Notification::send($user, new CrearCajero($user->email,$clave));
      return Redirect::to('cajeros')->with('success', 'Cajero creado');
    }

    /**
     * Redirige a la página para editar un cajero
     * @param  int $id id del Cajero
     * @return View Página para editar un cajero
     */
   public function edit($id){
      $cajero=Cajero::find($id);
      $usuarios=User::orderBy('name')->get();
       return view ('panel.cajeros.edit',compact('cajero','usuarios'));

    }

    /**
     * Actualiza un cajero y redirige a la ruta para listar cajeros
     * @param  CajeroRequest $request Atributos del Cajero
     * @param  int        $id      id del Cajero
     * @return Redirect Ruta para lista cajeros
     */
    public function update(CajeroRequest $request,$id){
      Cajero::updateOrCreate(['idcajero'=>$id],$request->all());
      return Redirect::to('cajeros')->with('success', 'Cajero actualizado');
    }
}

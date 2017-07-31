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

class CajeroController extends Controller{
     public function __construct(){
       $this->middleware('role:admin');
    }

    public function index(){
      $cajeros=Cajero::paginate(10);
      return view('panel.cajeros.index', compact('cajeros'));
    }

    public function create(){
      $usuarios = User::with(['rol' => function ($query) {
          $query->where('name','cajero');
      }])->orderBy('name')->get();
      return view('panel.cajeros.create', compact('usuarios'));
    }

    public function store(CajeroRequest $request){
      Cajero::create($request->all());
      $faker = Faker::create();
      $clave = $faker->regexify('[a-zA-Z0-9]{8}');
      User::updateOrCreate(['id'=>$request->iduser],['password'=>bcrypt($clave)]);
      $user=User::findOrFail($request->iduser);
      \Notification::send($user, new CrearCajero($user->email,$clave));
      return Redirect::to('cajeros')->with('success', 'Cajero creado');
    }

   public function edit($id){
      $cajero=Cajero::find($id);
      $usuarios=User::orderBy('name')->get();
       return view ('panel.cajeros.edit',compact('cajero','usuarios'));

    }
    public function update(CajeroRequest $request,$id){
      Cajero::updateOrCreate(['idcajero'=>$id],$request->all());
      return Redirect::to('cajeros')->with('success', 'Cajero actualizado');
    }
}

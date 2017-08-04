<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect ;

 use App\Http\Requests ;
 use App\Http\Requests\UserRequest ;
 use App\User;
 use App\Role;

/**
 * Clase UserController, CRUD para usuarios
 */
class UserController extends Controller{

  /**
   * Solo los usuarios con rol admin pueden acceder a los métodos
   */
  public function __construct() {
    $this->middleware('role:admin');
  }

  /**
   * Lista los usuarios
   * @return View Página de listado de usuarios
   */
  public function index(){
     $usuarios=User::paginate(10);
      return view('panel.usuarios.index',compact('usuarios'));
  }

  /**
   * Formulario para crear un usuario
   * @return View Página para crear un usuario
   */
   public function create(){
      return view('panel.usuarios.create');
    }

    /**
     * Registra un usuario y redirige al Formulario de creación de usuario
     * @param  UserRequest $request Atributos del usuario
     * @return Redirect Ruta para listar usuarios
     */
   public function store(UserRequest $request){
      $user=new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
      $user->save();
      $role = Role::where('name', $request->rol)->firstOrFail();
      $user->rol()->sync([$role->id]);
      return Redirect::to('usuarios/create')->with('success', 'Usuario creado');
    }

    /**
     * Formulario para editar un usuario
     * @param  int $id ID del usuario
     * @return View Página para editar un usuario
     */
    public function edit($id){
      $usuario=User::find($id);
       return view('panel.usuarios.edit',compact('usuario'));
    }

    /**
     * Actualiza la contraseña del usuario
     * @param  UserRequest $request Atributos del usuario
     * @param  int      $id      Id del usuario
     * @return View   Vista anterior
     */
    public function update(UserRequest $request,$id){
      $user=User::findOrFail($id);
      if ($request->password_now != null) {
            $user->password = bcrypt($request->password);
            $user->update();
            return back()->with('success','Contraseña cambiada');
      }else{
        $role = Role::where('name', $request->rol)->firstOrFail();
        $user->rol()->sync([$role->id]);
        return back()->with('success','Usuario actualizado');
      }
    }

    public function destroy($id){
      User::destroy($id);
      return Redirect::to('usuarios');
    }
}

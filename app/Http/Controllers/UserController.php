<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect ;

 use App\Http\Requests ;
 use App\Http\Requests\UserRequest ;
 use App\User;
 use App\Role;

class UserController extends Controller{
  public function __construct() {

  }

  public function index(){
     $usuarios=User::paginate(10);
      return view('panel.usuarios.index',compact('usuarios'));
  }

   public function create(){
      return view('panel.usuarios.create');
    }

   public function store(UserRequest $request){
      $user=new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
      $user->save();
      $role = Role::where('name', $request->rol)->firstOrFail();
      $user->rol()->sync([$role->id]);
      return Redirect::to('usuarios')->with('updated', 'Usuario creado');
    }

    public function edit($id){
      $usuarios=User::find($id);
       return view ('panel.usuarios.edit',compact('usuarios'));
    }

    public function show($id){
       return view ('panel.usuarios.show',['usuarios'=>User::findOrFail($id)]);
     }

    public function update(UserRequest $request,$id){
      User::updateOrCreate(['id'=>$id],$request->all());
      return Redirect::to('usuarios');
    }

     public function destroy($id){
      User::destroy($id);
      return Redirect::to('usuarios');
    }
}

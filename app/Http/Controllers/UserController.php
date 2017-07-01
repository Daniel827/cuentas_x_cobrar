<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect ;

 use App\Http\Requests ;
 use App\Http\Requests\UserRequest ;
 use App\User ;


class UserController extends Controller
{
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
      //User::create($request->exce());
    $user=new User;
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->save();
    //  $productos=Producto::paginate(10); // se mostrtarar de 10 en 10   en ves del paginate puede ser el get para muetre todo sin rangos
    //   return view ('productos.index',compact('productos'));// me redirecciona a este index
 
      return Redirect::to('usuarios');   //otro metodo para la redireccion

    }
    public function edit($id){
      $usuarios=User::find($id);
       return view ('panel.usuarios.edit',compact('usuarios'));

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

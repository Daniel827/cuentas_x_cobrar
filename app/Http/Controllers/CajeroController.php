<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\CajeroRequest;
use App\Cajero;
use App\User;

class CajeroController extends Controller{
     public function _construct(){

    }

    public function index(){
      $cajeros=Cajero::paginate(10);
      return view('panel.cajeros.index', compact('cajeros'));
    }

    public function create(){
      $usuarios=User::all();
      return view('panel.cajeros.create', compact('usuarios'));
    }

    public function store(CajeroRequest $request){
      Cajero::create($request->all());
         return Redirect::to('cajeros');
    }

   public function edit($id){
      $cajeros=Cajero::find($id);
       return view ('panel.cajeros.edit',compact('cajeros'));

    }
    public function update(CajeroRequest $request,$id){
      Cajero::updateOrCreate(['idCajero'=>$id],$request->all());
      return Redirect::to('cajeros');
    }

   public function cambiarEstado($id){
      $cajeros=Cajero::find($id);
        $cajeros->estado=$cajeros->estado='A' ? 'I' : 'A';
        $cajeros->update();
        return Redirect::to('cajeros');
    }
}

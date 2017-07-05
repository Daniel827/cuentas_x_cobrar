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
      $usuarios=User::orderBy('name')->get();
      return view('panel.cajeros.create', compact('usuarios'));
    }

    public function store(CajeroRequest $request){
      Cajero::create($request->all());
         return Redirect::to('cajeros')->with('success', 'Cajero creado');
    }

   public function edit($id){
      $cajero=Cajero::find($id);
      $usuarios=User::orderBy('name')->get();
       return view ('panel.cajeros.edit',compact('cajero','usuarios'));

    }
    public function update(CajeroRequest $request,$id){
      Cajero::updateOrCreate(['idCajero'=>$id],$request->all());
      return Redirect::to('cajeros')->with('success', 'Cajero actualizado');
    }

   public function cambiarEstado($id){
      $cajero=Cajero::find($id);
        $cajero->estado=$cajero->estado=='A' ? 'I' : 'A';
        $cajero->update();
        return Redirect::to('cajeros')->with('success','Estado del cajero "'.($cajero->estado=='A'?'Activado':'Desactivado').'"');
    }
}

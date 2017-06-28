<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\TipopagoRequest;
use App\TipoPago;

class TipoPagoController extends Controller
{
     public function _construct(){
      $this -> middleware('auth');
    }

    public function index(){
      $tipopagos=TipoPago::paginate(10);
      return view('tipopagos.index', compact('tipopagos'));
    }

    public function create(){
      return view('tipopagos.create');
    }

    public function store(TipopagoRequest $request){
      TipoPago::create($request->all());
      //return view('productos.index');
      return Redirect::to('tipopago');
    }

    public function edit($id){
      $tipopago=TipoPago::find($id);
      return view('tipopagos.edit', compact('tipopago'));
    }

    public function update(TipopagoRequest $request, $id){
      TipoPago::updateOrCreate(['idTipoPago'=>$id], $request->all());
      return Redirect::to('tipopago');
    }

    public function destroy($id){
      TipoPago::destroy($id);
      return Redirect::to('tipopago');
    }
}

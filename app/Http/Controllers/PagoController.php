<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function _construct(){
      $this -> middleware('auth');
    }

    public function index(){
      $pagos=Pago::paginate(10);
      return view('pagos.index', compact('pagos'));
    }

    public function create(){
      return view('pagos.create');
    }

    public function store(PagoRequest $request){
      Pago::create($request->all());
      //return view('productos.index');
      return Redirect::to('pago');
    }

    public function edit($id){
      $pago=Pago::find($id);
      return view('pagos.edit', compact('pago'));
    }

    public function update(PagoRequest $request, $id){
      Pago::updateOrCreate(['idPago'=>$id], $request->all());
      return Redirect::to('pago');
    }

    public function destroy($id){
      Pago::destroy($id);
      return Redirect::to('pago');
    }
}

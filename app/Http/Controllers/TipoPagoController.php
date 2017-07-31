<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\TipoPagoRequest;
use App\TipoPago;

class TipoPagoController extends Controller
{
     public function __construct(){
       $this->middleware('role:admin');
    }

    public function index(){
      $tipopagos=TipoPago::paginate(10);
      return view('panel.tipopagos.index', compact('tipopagos'));
    }

    public function create(){
      return view('panel.tipopagos.create');
    }

    public function store(TipoPagoRequest $request){
      TipoPago::create($request->all());
         return Redirect::to('tipopagos/create')->with('success', 'Tipo de pago creado');
    }

    public function edit($id){
      $tipopago=TipoPago::find($id);
      return view('panel.tipopagos.edit', compact('tipopago'));
    }

    public function update(TipoPagoRequest $request, $id){
      TipoPago::updateOrCreate(['idtipopago'=>$id], $request->all());
      return back()->with('success', 'Tipo de pago actualizado');
    }
}

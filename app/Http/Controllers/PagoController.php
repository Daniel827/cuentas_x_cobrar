<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use App\Pago;
use App\TipoPago;

class PagoController extends Controller
{
    public function _construct(){
      $this -> middleware('auth');
    }

   public function index(){
      $pagos=Pago::paginate(10);
      return view('panel.pagos.index', compact('pagos'));
    }

    public function create(){
      // llamar al listado de clientes del ws
      $tipoPagos=TipoPago::get();
      return view('panel.pagos.create',compact("tipoPagos"));
    }

    public function store(PagoRequest $request){
      Pago::create($request->all());
      //return view('productos.index');
<<<<<<< HEAD
      $idPago Pago::max("idPago");
      for($i=0;$i<len($request->idFactura;$i++ )
      $request->idFactura[$i]
      $request->idTipoPago[$i]
      $request->pago[$i]

      Pago::createOrUpdate("idPago")
      return Redirect::to('pago');
=======
      return Redirect::to('pagos');
>>>>>>> cbe00afb2f8582270a872ee6b3a46d681f5ecb09
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

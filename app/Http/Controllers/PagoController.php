<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use App\Pago;
use App\DetallePago;
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
       $pagos=Pago::get();
       return view('panel.pagos.create',compact("pagos"));
     }

      public function store(PagoRequest $request){
        Pago::create($request->all());
        $idPago=Pago::max("idPago");
      $total=0;
      for($i=0;$i<sizeof($request->idFactura);$i++ ){
        $idFactura=$request->idFactura[$i];
        $idTipoPago=$request->idTipoPago[$i];
        $pago=$request->pago[$i];
        DetallePago::create(["idFactura"=>$idFactura,"idTipoPago"=>$idTipoPago,"pago"=>$pago]);
        $total+=$pago;
      }
      Pago::createOrUpdate(["idPago"=>$idPago],["pago"=>$total]);
        return Redirect::to('pagos');
      }

      public function show($id){
        $pago=Pago::find($id);
       return view('panel.pagos.show', compact('pago'));
     }

     public function update(PagoRequest $request, $id){
       Pago::updateOrCreate(['idPago'=>$id], $request->all());
       return Redirect::to('pagos');
     }

     public function destroy($id){
       Pago::destroy($id);
       return Redirect::to('pago');
     }
}

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
       $tiposPago=TipoPago::orderBy('nombre')->get();
       return view('panel.pagos.create',compact("pagos",'tiposPago'));
     }

      public function store(PagoRequest $request){
        Pago::create($request->all());
        $idPago=Pago::max("idPago");
      for($i=0;$i<sizeof($request->idFactura);$i++ ){
        $idFactura=$request->idFactura[$i];
        $idTipoPago=$request->idTipoPago[$i];
        $pago=$request->pago[$i];
        DetallePago::create(["idPago"=>$idPago,"idFactura"=>$idFactura,"idTipoPago"=>$idTipoPago,"pago"=>$pago]);
      }
      $total=DetallePago::where('idPago',$idPago)->sum('pago');
      Pago::where('idPago',$idPago)->update(["totalPago"=>$total]);
      //Pago::updateOrCreate(["idPago"=>$idPago],["totalPago"=>$total]);
        return Redirect::to('pagos');
      }

      public function show($id){
        $pago=Pago::findOrFail($id);
        $detalles=$pago->detallesPago()->paginate(10);
       return view('panel.pagos.show', compact('pago','detalles'));
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

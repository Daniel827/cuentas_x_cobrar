<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\EnviarPago;
use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use App\Pago;
use App\User;
use App\DetallePago;
use App\TipoPago;
use App\Cliente;

class PagoController extends Controller{
    public function __construct(){
      $this->middleware('role:cajero');
    }

   public function index(){
      $pagos=Pago::orderBy('fecha','desc')->paginate(10);
      return view('panel.pagos.index', compact('pagos'));
    }

   public function create(){
      $this->getClientes();
       $clientes=Cliente::orderBy('apellidos')->get();
       $tiposPago=TipoPago::orderBy('nombre')->get();
       return view('panel.pagos.create',compact("clientes",'tiposPago'));
     }

    public function store(PagoRequest $request){
        Pago::create($request->all());
        $idpago=Pago::max("idpago");
        for($i=0;$i<sizeof($request->idfactura);$i++){
          $idFactura=$request->idfactura[$i];
          $idTipoPago=$request->idtipopago[$i];
          $pago=$request->pago[$i];
          //$this->updateSaldoFacturas($idFactura,$pago);
          DetallePago::create(["idpago"=>$idpago,"idfactura"=>$idFactura,"idtipopago"=>$idTipoPago,"pago"=>$pago]);
        }
        $total=DetallePago::where('idpago',$idpago)->sum('pago');
        $cliente=Cliente::findOrFail($request->idcliente);
        Pago::where('idpago',$idpago)->update(["totalpago"=>$total]);
        $user=new User;
        $user->email=$cliente->email;
        //\Notification::send($user, new EnviarPago());
        return Redirect::to('pagos/create')->with('success','Pago registrado');
    }

      public function show($numeroPago){
        $pago=Pago::where('numeropago',$numeroPago)->firstOrFail();
        $detalles=$pago->detallesPago()->paginate(10);
       return view('panel.pagos.show', compact('pago','detalles'));
     }
}

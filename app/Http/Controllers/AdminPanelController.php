<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activity;
use App\Cliente;
use App\Factura;
use App\Pago;

class AdminPanelController extends Controller{
  public function __construct() {
  }

  public function index(){
      return view('panel.index');
  }

  public function getNumberOfConnections(){
    $number = Activity::users()->count();
    return response()->json($number);
  }

  public function profile(){
      return view('panel.profile');
  }
   public function reportes(){
     $this->getClientes();
     $clientes=Cliente::orderBy('apellidos')->get();
      return view('panel.reportes',compact('clientes'));
  }

  public function getPDF(){
    $texto="";
    $pdf = \PDF::loadView('panel.cajeros.reporte',["texto"=>$texto]);
    return $pdf->stream('inicio.pdf');
  }

  public function getMovimientosClientes(Request $request){
    $idCliente=$request->idcliente;
    $cliente=Cliente::findOrFail($idCliente);
    $pagos=$cliente->pagos()->orderBy('idpago','desc')->get();
    $pdf = \PDF::loadView('panel.reportes.clientesmov',["cliente"=>$cliente,'pagos'=>$pagos]);
    return $pdf->stream('movimientos.pdf');
  }
    public function getPDF3(){
    $texto="Hola";
    $pdf = \PDF::loadView('panel.cajeros.reporte3',["texto"=>$texto]);
    return $pdf->stream('inicio.pdf');
  }
}

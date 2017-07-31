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

  public function getPagosFechas(Request $request){
    $fechaIni=$request->fechaini;
    $fechaFin=$request->fechafin;
    $pagos=Pago::whereDate('fecha','>=' ,$fechaIni)->whereDate('fecha','<=',$fechaFin)->orderBy('fecha')->get();
    $pdf = \PDF::loadView('panel.reportes.fechas',["pagos"=>$pagos,'fechaIni'=>$fechaIni,'fechaFin'=>$fechaFin]);
    return $pdf->stream('pagos por fechas.pdf');
  }

  public function getMovimientosClientes(Request $request){
    $idCliente=$request->idcliente;
    $cliente=Cliente::findOrFail($idCliente);
    $pagos=$cliente->pagos()->orderBy('idpago','desc')->get();
    $pdf = \PDF::loadView('panel.reportes.clientesmov',["cliente"=>$cliente,'pagos'=>$pagos]);
    return $pdf->stream('movimientos.pdf');
  }
    public function getSaldoClientes(){
      $clientes=DB::table('clientes as c')->join('facturas as f','f.idcliente','=','c.idcliente')
     ->select('cedula','nombres','apellidos','saldo')
     ->where('saldo','>',0)
     ->orderBy('apellidos')->get();
      $pdf = \PDF::loadView('panel.reportes.saldos',["clientes"=>$clientes]);
    return $pdf->stream('saldos.pdf');
  }
}

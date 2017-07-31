<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activity;
use App\Cliente;

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
     $clientes=Cliente::orderBy('apellidos')->get();
      return view('panel.reportes',compact('clientes'));
  }

  public function getPDF(){
    $texto="";
    $pdf = \PDF::loadView('panel.cajeros.reporte',["texto"=>$texto]);
    return $pdf->stream('inicio.pdf');
  }

     public function getPDF2(){
    $texto="Hola";
    $pdf = \PDF::loadView('panel.cajeros.reporte2',["texto"=>$texto]);
    return $pdf->stream('inicio.pdf');
  }
    public function getPDF3(){
    $texto="Hola";
    $pdf = \PDF::loadView('panel.cajeros.reporte3',["texto"=>$texto]);
    return $pdf->stream('inicio.pdf');
  }
}

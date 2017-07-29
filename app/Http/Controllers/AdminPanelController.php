<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Activity;

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

  public function getPDF(){
    $texto="";
    $pdf = \PDF::loadView('panel.cajeros.reporte',["texto"=>$texto]);
    return $pdf->stream('inicio.pdf');
  }
}

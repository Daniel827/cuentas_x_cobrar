<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller{
  public function __construct() {
  }

  public function index(){
      return view('panel.index');
  }

  public function profile(){
      return view('panel.profile');
  }

  public function getPDF(){
    $pdf = \PDF::loadView('panel.cajeros.reporte');
    return $pdf->stream('inicio.pdf');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalleController extends Controller
{

  public function _construct(){
   $this -> middleware('auth');
 }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;

class SaldoController extends Controller
{
     public function _construct(){
    }

    public function index(){
     $clientes=Cliente::select('clientes.*,23')->get();
      return $clientes;
    }
}

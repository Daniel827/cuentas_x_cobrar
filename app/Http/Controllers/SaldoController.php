<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use DB;

class SaldoController extends Controller
{
     public function _construct(){
    }

    public function index(){
      $clientes=DB::table('clientes as c')->join('facturas as f','f.idcliente','=','c.idcliente')
     ->select('cedula','nombre','apellido',DB::raw('sum(total) as saldo'))
     ->groupBy('cedula')
     ->orderBy('apellido')->get();
      return $clientes;
    }
}

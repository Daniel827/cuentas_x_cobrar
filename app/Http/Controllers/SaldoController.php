<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use DB;

/**
 * Controlador SaldoController, WS de saldos de los clientes
 */
class SaldoController extends Controller
{
     public function _construct(){
    }

    /**
     * Obtiene los clientes con su saldo pendiente
     * @return QueryBuilder Clientes con su saldo pendiente
     */
    public function index(){
      $this->getClientes();
      $cli=Cliente::all();
      foreach ($cli as $cl) {
        $this->getPendientes($cl->idcliente);
      }
      $clientes = DB::table('clientes as c')->join('facturas as f', 'f.idcliente', '=', 'c.idcliente')
                      ->select('cedula', 'nombres', 'apellidos', DB::raw('sum(saldo) as saldo'))
                      ->where('saldo', '>', 0)
                      ->groupBy('cedula', 'nombres', 'apellidos')
                      ->havingRaw('sum(saldo) > 0')
                      ->orderBy('apellidos')->get();
      return $clientes;
    }
}

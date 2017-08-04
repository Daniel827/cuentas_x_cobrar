<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Factura;

class ClienteController extends Controller {

    public function __construct() {
        $this->middleware('role:cajero');
    }

    public function getFacturasPendientes(Request $request) {
        $cliente = Cliente::findOrFail($request->idCliente);
        $this->getPendientes($cliente->idcliente);
        $facturas = $cliente->facturas()->where('saldo', '>', 0)->get();
        return response()->json($facturas);
    }

    public function getSaldoTemporal(Request $request){
      $arrayFacturas = $request->idFactura;
      $arrayPagos = $request->pagos;
      $factura = Factura::findOrFail($request->factura);
      $saldoTemporal = $factura->saldo;
      for ($i = 0; $i < sizeof($arrayFacturas); $i++) {
          if ($arrayFacturas[$i] == $factura->idfactura) {
              $saldoTemporal-= $arrayPagos[$i];
          }
      }
      \Log::info("saldoTemporal -> ".$saldoTemporal.", y saldoTotal -> ".$factura->saldo);
      return response()->json($saldoTemporal);
    }

    public function getSaldoDisponible(Request $request) {
        $arrayFacturas = $request->idFactura;
        $arrayPagos = $request->pagos;
        $cantidad = $request->cantidad;
        $factura = $request->factura;
        $fact = Factura::findOrFail($factura);
        $saldo = $fact->saldo;
        $montoActual = 0;
        for ($i = 0; $i < sizeof($arrayFacturas); $i++) {
            if ($arrayFacturas[$i] == $factura) {
                $montoActual += $arrayPagos[$i];
            }
        }
        $valido = true;
        $acumulado = $cantidad + $montoActual;
        if ($acumulado <= $saldo) {
            $valido = true;
        } else {
            $valido = false;
        }
        \Log::info('acumulado = ' . $acumulado . ', saldo = ' . $saldo . ', cantidad = ' . $cantidad . ', monto Actual = ' . $montoActual);
        return response()->json($valido);
    }

}

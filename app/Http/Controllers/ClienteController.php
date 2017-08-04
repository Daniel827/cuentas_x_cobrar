<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Factura;

/**
 * Controlador ClienteController, métodos para los clientes
 */
class ClienteController extends Controller {

    /**
     * Se necesita rol de cajero para acceder a los métodos
     */
    public function __construct() {
        $this->middleware('role:cajero');
    }

    /**
     * Obtiene las facturas pendientes de un cliente
     * @param  Request $request Cliente
     * @return JSON Facturas pendientes
     */
    public function getFacturasPendientes(Request $request) {
        $cliente = Cliente::findOrFail($request->idCliente);
        $this->getPendientes($cliente->idcliente);
        $facturas = $cliente->facturas()->where('saldo', '>', 0)->get();
        return response()->json($facturas);
    }

    /**
     * Obtiene el saldo temporal que debe el cliente antes de realizar el cobro
     * @param  Request $request Atributos del cliente y sus pagos
     * @return JSON Saldo temporal
     */
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
      return response()->json($saldoTemporal);
    }

    /**
     * Valida si la cantidad agregada es menor o igual a el saldo disponible de una factura
     * @param  Request $request Atributos del clientes
     * @return JSON Bolean (Cantida válida al insertar)
     */
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
        return response()->json($valido);
    }

}

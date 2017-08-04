<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovimientosClienteRequest;
use App\Http\Requests\PagosFechaRequest;
use Activity;
use App\Cliente;
use App\Factura;
use App\Pago;
use DB;

/**
 * Controlador AdminPanelController, controla reportes y otras tareas de administración
 */
class AdminPanelController extends Controller {

    /**
     *  Se llama al WS Clientes del módulo de facturación
     */
    public function __construct() {
          $this->getClientes();
    }

    /**
     * Redirige a la página de inicio del panel de administración
     * @return View Página de Inicio
     */
    public function index() {
        return view('panel.index');
    }

    /**
     * Obtiene el número de usuarios online
     * @return int  Número de usuarios online
     */
    public function getNumberOfConnections() {
        $number = Activity::users()->count();
        return response()->json($number);
    }

    /**
     * Redirige a la vista del perfil de usuario
     * @return View Perfil de usuario
     */
    public function profile() {
        return view('panel.profile');
    }

    /**
     * Redirige a la vista de los reportes
     * @return View Sección de reportes
     */
    public function reportes() {
        $clientes = Cliente::orderBy('apellidos')->get();
        return view('panel.reportes', compact('clientes'));
    }

    /**
     * Obtiene el reporte por fechas inicial y final
     * @param  PagosFechaRequest $request Atributos de fechas inicial y final
     * @return PDF  Reporte
     */
    public function getPagosFechas(PagosFechaRequest $request) {
        $fechaIni = $request->fechaini;
        $fechaFin = $request->fechafin;
        $pagos = Pago::whereDate('fecha', '>=', $fechaIni)->whereDate('fecha', '<=', $fechaFin)->orderBy('fecha')->get();
        $pdf = \PDF::loadView('panel.reportes.fechas', ["pagos" => $pagos, 'fechaIni' => $fechaIni, 'fechaFin' => $fechaFin]);
        return $pdf->stream('Pagos por fechas.pdf');
    }

    /**
     * Obtiene el reporte de los movimientos del cliente
     * @param  MovimientosClienteRequest $request Atributos de idCliente
     * @return PDF  Reporte
     */
    public function getMovimientosClientes(MovimientosClienteRequest $request) {
        $idCliente = $request->idcliente;
        $cliente = Cliente::findOrFail($idCliente);
        $pagos = $cliente->pagos()->orderBy('idpago', 'desc')->get();
        $pdf = \PDF::loadView('panel.reportes.clientesmov', ["cliente" => $cliente, 'pagos' => $pagos]);
        return $pdf->stream('movimientos.pdf');
    }

    /**
     * Obtiene el reporte de saldos de los clientes
     * @return PDF Reporte
     */
    public function getSaldosClientes() {
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
        $pdf = \PDF::loadView('panel.reportes.saldos', ["clientes" => $clientes]);
        return $pdf->stream('saldos.pdf');
    }

}

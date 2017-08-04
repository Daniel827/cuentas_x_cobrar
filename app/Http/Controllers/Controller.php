<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Cliente;
use App\Factura;

/**
 * Controlador Controller, contiene los métodos para consumir los WS del módulo de facturación
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Obtiene los clientes registrados del módulo de facturación y los registra en la BD
     */
    protected function getClientes(){
      $url="http://modulofactura.herokuapp.com/clientes";
      try {
        $json=file_get_contents($url);
        $listado=json_decode($json,true);
        foreach($listado['datos'] as $list){
          $cliente=Cliente::find($list['idcliente']);
          if($cliente==null){
            $id=$list['idcliente'];
            $cedula=$list['cedula'];
            $tipo=$list['idtipo'];
            $nombre=$list['nombre'];
            $apellido=$list['apellido'];
            $fecha=$list['nacimiento'];
            $ciudad=$list['ciudad'];
            $direccion=$list['direccion'];
            $telefono=$list['telefono'];
            $email=$list['email'];
            $estado=$list['estado'];
            Cliente::create(['idcliente'=>$id,'cedula'=>$cedula,'idtipo'=>$tipo,'nombres'=>$nombre,'apellidos'=>$apellido,
              'nacimiento'=>$fecha,'ciudad'=>$ciudad,'telefono'=>$telefono,'email'=>$email,'estado'=>$estado]);
          }
        }
      } catch (Exception $e) {
      }
    }

    /**
     * Obtiene la factura pendiente
     * @param  int $idFactura id de la Factura
     * @return Array  Datos de la factua pendiente
     */
    private function findFacturaCliente($idFactura){
      $url="http://modulofactura.herokuapp.com/FacturasPendientes";
      try {
        $json=file_get_contents($url);
        $listado=json_decode($json,true);
        if(isset($listado['datos'])){
          foreach($listado['datos'] as $list){
              if($list['idcabecera']==$idFactura){
                return $list;
              }
          }
        }
        return null;
      } catch (Exception $e) {
        return null;
      }
    }

    /**
     * Busca todas las facturas pendientes del cliente y las registra/actualiza en la BD
     * @param  int $idCliente id del Cliente
     */
    protected function getPendientes($idCliente){
      $url="http://modulofactura.herokuapp.com/cabeceras";
      try {
        $json=file_get_contents($url);
        $listado=json_decode($json,true);
        if(isset($listado['datos'])){
          foreach($listado['datos'] as $list){
            $id=$list['idcabecera'];
            $numero="FACT-".(str_pad($id, 5, "0",STR_PAD_LEFT));
            $factura=Factura::find($id);
            $lista=$this->findFacturaCliente($id);
            if($lista==null){
              $saldo=0;
            }else{
              $saldo=$lista['saldo'];
            }
            if($factura==null){
              Factura::create(['idfactura'=>$id,'idcliente'=>$idCliente,'saldo'=>$saldo,'numerofactura'=>$numero]);
            }else{
              $factura->saldo=$saldo;
              $factura->update();
            }
          }
        }
      } catch (Exception $e) {
      }
    }

    /**
     * Actualiza el saldo de la factura en la BD del módulo de facturación
     * @param  int $idFactura Id de la factura
     * @param  int $cantidad  Cantidad a abonar
     */
    protected function updateSaldoFacturas($idFactura,$cantidad){
      $pendiente=$this->findFacturaCliente($idFactura);
      if($pendiente!=null){
        try{
          $url="http://modulofactura.herokuapp.com/cabecera/".$pendiente['idpendiente']."/facturaspendientes/".$cantidad;
          file_get_contents($url);
        } catch (Exception $e) {
        }
      }
    }
}

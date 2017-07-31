<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getClientes(){
      $url="http://modulofacturacion.herokuapp.com/clientes";
      $json=file_get_contents($url);
      $listado=json_decode($json,true);
      foreach($listado['datos'] as $list){
        $cliente=Cliente::find($list['IDCLIENTE']);
        if($cliente==null){
          $id=$list['IDCLIENTE'];
          $cedula=$list['CEDULA'];
          $tipo=$list['IDTIPO'];
          $nombre=$list['NOMBRE'];
          $apellido=$list['APELLIDO'];
          $fecha=$list['NACIMIENTO'];
          $ciudad=$list['CIUDAD'];
          $direccion=$list['DIRECCION'];
          $telefono=$list['TELEFONO'];
          $email=$list['EMAIL'];
          $estado=$list['ESTADO'];
          Cliente::create(['idcliente'=>$id,'cedula'=>$cedula,'idtipo'=>$tipo,'nombres'=>$nombre,'apellidos'=>$apellido,
            'nacimiento'=>$fecha,'ciudad'=>$ciudad,'telefono'=>$telefono,'email'=>$email,'estado'=>$estado]);
        }
      }
    }

    protected function getPendientes($idCliente){
      $url="http://modulofacturacion.herokuapp.com/cliente/".$idCliente."/facturaspendientes";
      $json=file_get_contents($url);
      $listado=json_decode($json,true);
      foreach($listado['data'] as $list){
        $id=$list['IDCABECERA'];
        $numero="FACT-".(str_pad($id, 5, "0",STR_PAD_LEFT));
        if(isset($list['facturaspendientes'])){
          $fact=$list['facturaspendientes'];
          $saldo=$fact[0]['SALDO'];
          $factura=Factura::find($id);
          if($factura==null){
            Factura::create(['idfactura'=>$id,'idcliente'=>$idCliente,'saldo'=>$saldo,'numerofactura'=>$numero]);
          }else{
            $factura->saldo=$saldo;
            $factura->update();
          }
        }
      }
    }

    protected function updateSaldoFacturas($idFactura,$cantidad){
      $url="http://modulofacturacion.herokuapp.com/cabecera/".$idFactura."/facturaspendientes/".$cantidad;
      file_get_contents($url);
    }
}

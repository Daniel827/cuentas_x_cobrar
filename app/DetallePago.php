<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo DetallePago
 */
class DetallePago extends Model {

    protected $table = "detallespago";
    protected $primaryKey = "iddetalle";
    public $timestamps = false;
    protected $fillable = [
        'idpago',
        'idtipopago',
        'idfactura',
        'pago'
    ];

    /**
     * @return TipoPago Tipo del pago del detalle
     */
    public function tipoPago(){
    	return $this->belongsTo('App\TipoPago', 'idtipopago');
    }

    /**
     * @return Factura Factura del detalle
     */
    public function factura(){
      return $this->belongsTo('App\Factura', 'idfactura');
    }
}

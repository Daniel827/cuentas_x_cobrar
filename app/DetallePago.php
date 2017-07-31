<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function tipoPago(){
    	return $this->belongsTo('App\TipoPago', 'idtipopago');
    }

    public function factura(){
      return $this->belongsTo('App\Factura', 'idfactura');
    }
}

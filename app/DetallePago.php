<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model {

    protected $table = "detallespago";
    protected $primaryKey = "idDetalle";
    public $timestamps = false;
    protected $fillable = [
        'idPago',
        'idTipoPago',
        'idFactura',
        'pago'
    ];


    public function tipoPago(){
    	return $this->belongsTo('App\TipoPago', 'idTipoPago');
    }
  
}

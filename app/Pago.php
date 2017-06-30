<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

    protected $table = "pagos";
    protected $primaryKey = "idPago";
    public $timestamps = false;
    protected $fillable = [
        'idCajero',
        'idCliente',
        'descripcion',
        'numeroPago',
        'totalPago'
    ];

    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idPago');
    }

    public function user() {
        return $this->belongsTo('App\Cajero', 'idCajero');
    }
}

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
        'descripcion'
    ];

    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idPago');
    }

    public function cajero() {
        return $this->belongsTo('App\Cajero', 'idCajero');
    }
}

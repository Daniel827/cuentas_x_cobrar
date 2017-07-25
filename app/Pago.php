<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

    protected $table = "pagos";
    protected $primaryKey = "idpago";
    public $timestamps = false;
    protected $fillable = [
        'idCajero',
        'idCliente',
        'descripcion'
    ];

    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idpago');
    }

    public function cajero() {
        return $this->belongsTo('App\Cajero', 'idcajero');
    }
}

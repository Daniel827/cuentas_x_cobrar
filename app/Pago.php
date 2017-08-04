<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Pago
 */
class Pago extends Model {

    protected $table = "pagos";
    protected $primaryKey = "idpago";
    public $timestamps = false;
    protected $fillable = [
        'idcajero',
        'idcliente',
        'descripcion'
    ];

    /**
     * @return DetallePago[] Detalles del pago
     */
    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idpago');
    }

    /**
     * @return Cajero Cajero que efectuó el cobro
     */
    public function cajero() {
        return $this->belongsTo('App\Cajero', 'idcajero');
    }

    /**
     * @return Cliente Cliente que realizó el pago
     */
    public function cliente() {
        return $this->belongsTo('App\Cliente', 'idcliente');
    }
}

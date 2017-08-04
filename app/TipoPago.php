<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo TipoPago
 */
class TipoPago extends Model {

    protected $table = "tipopagos";
    protected $primaryKey = "idtipopago";
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'referencia',
        'descripcion',
        'estado'
    ];

    /**
     * @return DetallePago[] Detalles del pago con un tipo de pago designado
     */
    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idtipopago');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Factura
 */
class Factura extends Model
{
    protected $table = "facturas";
    protected $primaryKey = "idfactura";
    public $timestamps = false;

    protected $fillable = [
        'idfactura',
        'idcliente',
        'numerofactura',
        'saldo'
    ];

    /**
     * @return Cliente Cliente al que pertenece la factura
     */
    public function cliente() {
        return $this->belongsTo('App\Cliente', 'idcliente');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idtipopago');
    }
}

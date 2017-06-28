<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model {

    protected $table = "tipopagos";
    protected $primaryKey = "idTipoPago";
    public $timestamps = false;
    protected $fillable = [
        'codigo',
        'nombre',
        'referencia',
        'descripcion',
        'estado'
    ];

    public function detallesPago() {
        return $this->hasMany('App\DetallePago', 'idTipoPago');
    }
}

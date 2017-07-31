<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "facturas";
    protected $primaryKey = "idfactura";
    public $timestamps = false;

    protected $fillable = [
        'idfactura',
        'idcliente',
        'numerofactura',
        'total'
    ];

    public function cliente() {
        return $this->belongsTo('App\Cliente', 'idcliente');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $primaryKey = "idcliente";
    public $timestamps = false;

    protected $fillable = [
        'idcliente',
        'idtipo',
        'cedula',
        'nombres',
        'apellidos',
        'nacimiento',
        'ciudad',
        'direccion',
        'telefono',
        'email',
        'estado'
    ];

    public function facturas() {
        return $this->hasMany('App\Factura', 'idcliente');
    }

    public function pagos() {
        return $this->hasMany('App\Pago', 'idcliente');
    }
}

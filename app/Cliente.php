<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Cliente
 */
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

    /**
     * @return Factura[] Facturas del cliente
     */
    public function facturas() {
        return $this->hasMany('App\Factura', 'idcliente');
    }

    /**
     * @return Pago[] Pagos que hizo el cliente
     */
    public function pagos() {
        return $this->hasMany('App\Pago', 'idcliente');
    }
}

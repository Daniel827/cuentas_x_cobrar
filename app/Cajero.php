<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Cajero
 */
class Cajero extends Model {

    protected $table = "cajeros";
    protected $primaryKey = "idcajero";
    public $timestamps = false;
    protected $fillable = [
        'iduser',
        'cedula_ruc',
        'nombres',
        'apellidos',
        'fechanac',
        'ciudadnac',
        'direccion',
        'telefono',
        'email',
        'estado'
    ];

    /**
     * @return User Usuario del cajero
     */
    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }

    /**
     * @return Pago[] Pagos que efectuó el cajero
     */
    public function pagos() {
        return $this->hasMany('App\Pago', 'idcajero');
    }

}

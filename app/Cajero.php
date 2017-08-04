<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function user() {
        return $this->belongsTo('App\User', 'iduser');
    }

    public function pagos() {
        return $this->hasMany('App\Pago', 'idcajero');
    }

}

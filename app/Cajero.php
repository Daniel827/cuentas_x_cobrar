<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajero extends Model {

    protected $table = "cajeros";
    protected $primaryKey = "idcajero";
    public $timestamps = false;
    protected $fillable = [
        'idUser',
        'cedula_ruc',
        'nombres',
        'apellidos',
        'fechaNac',
        'ciudadNac',
        'direccion',
        'telefono',
        'email',
        'estado'
    ];

    public function user() {
        return $this->belongsTo('App\User','iduser');
    }

    public function pagos() {
        return $this->hasMany('App\Pago', 'idcajero');
    }
}

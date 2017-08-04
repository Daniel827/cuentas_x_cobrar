<?php
//cury
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Notifications\ResetearClave;

/**
 * Modelo User
 */
class User extends Authenticatable {

    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Envia la notificación de reseteo de contraseña al e-mail del usuaio
     * @param string $token Token
     */
    public function sendPasswordResetNotification($token){
        $this->notify(new ResetearClave($token));
    }

    /**
     * @return Cajero Cajero que tiene ese usuario
     */
    public function cajero() {
        return $this->hasOne('App\Cajero', 'iduser');
    }

    /**
     * @return Role[] Roles del usuario
     */
    public function rol() {
        return $this->belongsToMany('App\Role', 'role_user');
    }

}

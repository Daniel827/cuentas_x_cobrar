<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

/**
 * Modelo Role
 */
class Role extends EntrustRole {

    /**
     * @return Permission[] Permisos de un rol
     */
    public function permissions() {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }

    /**
     * @return User[] Usuarios de un rol
     */
    public function users() {
        return $this->belongsToMany('App\User', 'role_user');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'codigoAdministrador',
       'nomeAdministrador', 
       'cpfAdministrador', 
       'user', 
       'password', 
       'statusAdministrador', 
       'tipoAdministrador',
    ];
}

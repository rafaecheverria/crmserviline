<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;


    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'rut', 'phone', 'address', 'birth_date',
    ];

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtolower($valor);
    }
    public function getNameAttribute($valor)
    {
        return ucwords($valor);
    }
    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function scopeBuscar($query, $buscar="")
    {
         $resultado = $query->where('name', 'like', '%'.$buscar.'%');
       /*switch ($parametro) {
           case 'R':
                    $resultado = $query->where('rut', 'like', '%'.$buscar.'%');
               break;

           case 'N':
                    $resultado = $query->where('name', 'like', '%'.$buscar.'%');
               break;

            case 'A':
                    $resultado = $query->where('last_name', 'like', '%'.$buscar.'%');
               break;

            case 'T':
                    $resultado = $query->where('last_name', 'like', '%'.$buscar.'%');
               break;
       }*/

       return $resultado;
    }
}

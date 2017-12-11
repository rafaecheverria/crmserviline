<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    protected $table = "users";

    protected $fillable = [
        'nombres', 'apellidos', 'email', 'password', 'rut', 'telefono', 'direccion', 'nacimiento', 'titulo', 'estudios_complementarios', 'posicion', 'speciality_id', 'fecha_admision', 'descripcion', 'actividad'
    ];

    //protected $table = 'Users'
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function specialities()
    {
        return $this->hasMany('App\Speciality');
    }
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

    
}

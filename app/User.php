<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    protected $table = "users";

    protected $fillable = [
        'id', 'nombres', 'apellidos', 'email', 'password', 'rut', 'telefono', 'direccion', 'nacimiento', 'titulo', 'estudios_complementarios', 'posicion', 'fecha_admision', 'descripcion', 'actividad', 'avatar'
    ];

   
    protected $dates = [
        'nacimiento'
    ];
/*
    public function getNacimientoAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
        
    }
    public function setNacimientoAttribute($value)
    {
        $this->attributes['nacimiento'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }*/
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function specialities()
    {
        return $this->belongsToMany('App\Speciality');
    }
    public function setNombresAttribute($valor)
    {
        $this->attributes['nombres'] = strtolower($valor);
    }
    public function getNombresAttribute($valor)
    {
        return ucwords($valor);
    }
    public function setApellidosAttribute($valor)
    {
        $this->attributes['apellidos'] = strtolower($valor);
    }
    public function getApellidosAttribute($valor)
    {
        return ucwords($valor);
    }
    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function getEdad(){
        return $this->nacimiento->diffInYears(now());
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    
}

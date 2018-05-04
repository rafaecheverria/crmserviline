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
        'id', 'nombres', 'apellidos', 'email', 'password', 'rut', 'telefono', 'direccion', 'nacimiento', 'titulo', 'estudios_complementarios', 'posicion', 'fecha_admision', 'descripcion', 'actividad', 'avatar', 'sangre', 'vih', 'peso', 'altura', 'alergia', 'medicamento_actual', 'enfermedad'
    ];

     protected $appends = ['years'];
     /*
    public function getNacimientoAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
        
    }
    public function setNacimientoAttribute($value)
    {
        $this->attributes['nacimiento'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }*/
   public static function doctores($id) //obtiene los doctores en los select de agregar y editar cita que estan ligados a una especialidad
    {
        $users = Speciality::findOrFail($id)->users; //lista los usuarios que tinen el id de la especialidad que recibe como parametro
        return $users;
    }

    public function queries()
    {
        return $this->hasMany('App\Query');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function specialities()
    {
        return $this->belongsToMany('App\Speciality');
    }
    public function dias()
    {
        return $this->belongsTo('App\Dias');
    }
    public function unities()
    {
        return $this->belongsToMany('App\Unity');
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

    public function getYearsAttribute()
    {
        return Carbon::parse($this->nacimiento)->age;
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['nombres'] .' '. $this->attributes['apellidos'];
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    
}

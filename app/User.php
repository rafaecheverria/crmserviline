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
        'name', 'last_name', 'email', 'password', 'rut', 'phone', 'address', 'birth_date','title', 'complementary_studies', 'position', 'speciality_id', 'admission_date', 'description', 'activity'
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

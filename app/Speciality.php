<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	protected $table = "specialities";

     protected $fillable = [
        'id', 'nombre',
    ];


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
     public function setNombreAttribute($valor)
    {
        $this->attributes['nombre'] = strtolower($valor);
    }
    public function getNombreAttribute($valor)
    {
        return ucwords($valor);
    }
}

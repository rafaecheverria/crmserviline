<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
	protected $table = "organizaciones";

	 protected $fillable = [
        'id', 'nombre', 'email', 'rut', 'telefono', 'direccion', 'actividad', 'descripcion', 'estado', 'logo', 'tipo'
    ];
	
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
}

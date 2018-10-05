<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
	protected $table = "organizaciones";

	 protected $fillable = [
        'id', 'nombre', 'email', 'rut', 'telefono', 'direccion', 'actividad', 'descripcion', 'estado', 'logo', 'tipo', 'ciudad_id', 'region_id', 'vendedor_id', 'created_at', 'updated_at'
    ];
	
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    /*public function vendedores()
    {
        return $this->hasOne('App\User');
    }*/
    public function getUpdatedAttribute()
    {
        //return Carbon::parse($this->fecha_inicio)->format('d-m-Y'); 
        return Date::parse($this->updated_at)->toDayDateTimeString();
       
    }
}

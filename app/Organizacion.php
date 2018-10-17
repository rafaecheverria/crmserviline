<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
	protected $table = "organizaciones";

	 protected $fillable = [
        'id', 'nombre', 'email', 'rut', 'telefono', 'direccion', 'actividad', 'descripcion', 'estado', 'logo', 'tipo', 'ciudad_id', 'region_id', 'vendedor_id'
    ];
	
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function estados()
    {
        return $this->belongsToMany('App\Estado')->withPivot('nota', 'fecha_creado', 'fecha_actualizado');
    }
    public function setNombreAttribute($valor)
    {
        $this->attributes['nombre'] = ucwords($valor);
    }
    public function getUpdatedAttribute()
    {
        return Date::parse($this->updated_at)->toDayDateTimeString();
    }
}

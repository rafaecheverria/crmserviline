<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
	protected $fillable = [
       'id','fecha_inicio', 'fecha_fin', 'estado', 'title', 'descripcion', 'doctor_id', 'paciente_id', 'unity_id', 'speciality_id'
    ];

    protected $appends = ['years'];
   // protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function getYearsAttribute()
    {
		//return Carbon::parse($this->fecha_inicio)->format('d-m-Y'); 
        return Date::parse($this->fecha_inicio)->toFormattedDateString();
       
	}

	public function setPacienteIdAttribute($valor)
    {
        $this->attributes['paciente_id'] = strtolower($valor);
    }
    public function getPacienteIdAttribute($valor)
    {
        return ucwords($valor);
    }
}
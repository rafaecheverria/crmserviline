<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
	protected $fillable = [
        'id', 'fecha_inicio', 'fecha_fin', 'hora', 'doctor_id', 'paciente_id', 'unity_id', 'estado', 'diagnostico', 'descripcion'
    ];

    public function getCitas()
    {
    	return $this->select('id', 'fecha_inicio', 'fecha_fin', 'paciente_id', 'doctor_id');
	}

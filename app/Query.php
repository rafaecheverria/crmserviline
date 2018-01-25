<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
	protected $fillable = [
       'id','fecha_inicio', 'fecha_fin', 'estado', 'title', 'descripcion', 'doctor_id', 'paciente_id', 'unity_id'
    ];

}
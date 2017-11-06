<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'fecha', 'hora', 'paciente_id', 'doctor_id',
    ];
}

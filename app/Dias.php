<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    protected $fillable = [
       'id','fecha_inicio', 'fecha_fin', 'title', 'color', 'observacion', 'doctor_id'
    ];
}

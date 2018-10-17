<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estados";
    //public $timestamps = false;
    protected $fillable = [
        'id', 'estado', 'color'
    ];

    public function organizaciones()
    {
        return $this->belongsToMany('App\Organizacion')->withPivot('nota', 'fecha_creado', 'fecha_actualizado');
    }
}

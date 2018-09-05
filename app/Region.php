<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regiones";

    protected $fillable = [
        'id', 'nombre'
    ];

    public function ciudades()
    {
        return $this->belongsToMany('App\Ciudad');
    }
}

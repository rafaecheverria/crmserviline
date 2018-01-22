<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
     protected $fillable = [
        'nombre', 'telefono', 'email', 'direccion', 'avatar', 'region', 'ciudad'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargos";
    protected $fillable = [
        'id', 'nombre'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}

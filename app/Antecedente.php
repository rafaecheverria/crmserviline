<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    protected $fillable = [
        'sangre', 'vih', 'peso', 'altura', 'alergia', 'medicamento_actual', 'enfermedad'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

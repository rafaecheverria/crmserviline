<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	protected $table = "specialities";

     protected $fillable = [
        'id', 'nombre',
    ];

    public function getFullNameAttribute()
	{
    	return $this->name;
	}

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

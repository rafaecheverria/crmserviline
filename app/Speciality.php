<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	protected $table = "specialities";

     protected $fillable = [
        'id', 'name',
    ];

    public function getFullNameAttribute()
	{
    	return $this->name;
	}

    public function users()
    {
        return $this->hasOne('App\User');
    }
}

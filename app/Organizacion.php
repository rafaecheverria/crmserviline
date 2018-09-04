<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
	protected $table = "organizaciones";
	
    public function User()
    {
        return $this->belongsTo('App/User');
    }
}

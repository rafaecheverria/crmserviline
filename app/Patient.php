<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends User
{
	protected $fillable = [
        'admission_date', 'description', 'activity',
    ];
    
    public function Query()
    {
    	return $this->hasMany(Query::class);
    }
}

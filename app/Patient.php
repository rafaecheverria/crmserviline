<?php

namespace App;

use App\Query;

use Illuminate\Database\Eloquent\Model;

class Patient extends User
{
	protected $fillable = [
        'name', 'email', 'password',
    ];
    
    public function Query()
    {
    	return $this->hasMany(Query::class);
    }
}

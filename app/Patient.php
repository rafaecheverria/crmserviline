<?php

namespace App;

class Patient extends User
{
    
    public function Query()
    {
    	return $this->hasMany(Query::class);
    }
}

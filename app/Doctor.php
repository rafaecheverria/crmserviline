<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends User()
{
    protected $fillable = [
        'title', 'specialty', 'complementary_studies', 'position', 
    ];
}

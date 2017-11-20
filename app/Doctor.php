<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends User
{
    protected $fillable = [
        'title', 'complementary_studies', 'position', 'speciality_id',
    ];
}

<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use App\User;

class Role extends EntrustRole
{
    //

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}

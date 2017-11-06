<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserRoleController extends Controller
{

    public function index()
    {
        $role = Role::find(2);
        $personas = $role->users;
        return view('personas.index', compact('personas'));
         //return response()->json(['data' => $users], 200);
    }

}

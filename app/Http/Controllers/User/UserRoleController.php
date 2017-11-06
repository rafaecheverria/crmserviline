<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserRoleController extends Controller
{

    public function index(User $user)
    {
        $administradores = $user->all()
                                ->with('role.administrador');
        //$collection = $personas->Role->administrador;
        return response()->json(['data' => $administradores], 200);
        //return view('personas.index', compact('personas'));
        //var_dump($personas);
    }

}

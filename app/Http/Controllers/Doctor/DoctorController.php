<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DoctorController extends ApiController
{
    public function index(User $user)
    {
        $personas = $user->withRole('doctor')->paginate(5);
        //$user = User::hasRole('administrador');
        //$personas = $user->roles;
        //return $this->showAll($personas); // ahora esta operativo ya que habia que importar la collection en el Trait.
        //$personas = User::all()->join('posts', 'usuarios.id', '=', 'posts.user_id')->paginate(5);
        return view('doctores.index', compact('personas'));
        //return response()->json(['data' => $personas], 200);
        //return response()->json($personas);
        //dd($personas);
    }
}

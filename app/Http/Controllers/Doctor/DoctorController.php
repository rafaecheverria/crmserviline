<?php

namespace App\Http\Controllers\Doctor;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DoctorController extends ApiController
{
    public function index(Role $role)
    {
        //$users = $role->users;
        //return $this->showAll($users);
        $role = Role::find(2);
        $personas = $role->users;
        //return $this->showAll($personas);
        //$personas = User::all()->join('posts', 'usuarios.id', '=', 'posts.user_id')->paginate(5);
        return view('doctores.index', compact('personas'));
        //return response()->json(['data' => $users], 200);
        //dd($personas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

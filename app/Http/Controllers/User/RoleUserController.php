<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class RoleUserController extends Controller
{
    public function index()
    {
        //
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
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->roles()->sync($request->role);   
            return response()->json([
                "apellidos" => $user->apellidos,
                "message" => "los roles del usuario ".$user->apellidos." se han actualizado correctamente !"
                ]);
           
        }
    }

    public function destroy($id)
    {
        //
    }
}

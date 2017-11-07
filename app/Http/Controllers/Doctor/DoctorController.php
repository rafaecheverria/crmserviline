<?php

namespace App\Http\Controllers\Doctor;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
     public function index()
    {
        $role = Role::find(1);
        $personas = $role->users;
        return view('doctores.index', compact('personas'));
         //return response()->json(['data' => $users], 200);
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

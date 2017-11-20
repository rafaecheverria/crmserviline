<?php

namespace App\Http\Controllers\Receptionist;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceptionistController extends Controller
{
    public function index()
    {
        $role = Role::find(3);
        $personas = $role->users;
        return view('recepcionistas.index', compact('personas'));
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

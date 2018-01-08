<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    public function index()
    {
        return view('pacientes.index'); 
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show()
    {
         $users = User::select(['id', 'rut', 'nombres', 'apellidos', 'telefono', 'nacimiento'])->withRole('paciente');
        return  datatables()->query($users)->toJson()
                ->editColumn('nacimiento', function ($user) {
                return $user->getEdad();
                    })
                    ->addColumn('action', function ($user) {
                        return '<a href="#" onclick="roles_user('.$user->id.')" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#roleModal"><i class="material-icons">settings_brightness</i></a>
                        <a href="recepcionistas/'.$user->id.'/edit" id="update"  class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>
                        <a href="#" onclick="eliminar_recep('.$user->id.')" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';
                    })->make(true);
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

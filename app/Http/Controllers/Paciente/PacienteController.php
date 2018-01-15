<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    public function index()
    {
        return view('pacientes.index');
    }

    public function show()
    {
         $users = User::select(['id', 'nombres', 'apellidos', 'telefono', 'nacimiento'])->withRole('paciente');
        return  datatables()->of($users)
                ->editColumn('nacimiento', function ($user) {
                return $user->getEdad();
                    })
                    ->addColumn('action', function ($user) {
                        return '<a href="pacientes/perfil/'.$user->id.'" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">person</i></a>
                        <a href="#" onclick="antecedentes_personales('.$user->id.')"  data-toggle="modal" data-target="#antecedentePersonalModal" rel="tooltip" title="Antecedentes Personales" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">assignment_ind</i></a>
                        <a href="#" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>
                        <a href="#" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                    })->make(true);
    }

    public function edit($id)
    {
        //
    }
}

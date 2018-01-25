<?php

namespace App\Http\Controllers\Citas;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ConsultasMedicasController extends Controller
{
    public function index()
    {
        return view('consultas_medicas.index');
    }

    public function show()
    {
        $users = User::select(['id', 'nombres', 'apellidos', 'nacimiento'])->withRole('paciente');
        return  datatables()->of($users)
                    ->addColumn('action', function ($user) {
                        return '<a href="#" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">person</i></a>
                        <a href="#" onclick="#"  data-toggle="modal" data-target="#antecedentePersonalModal" rel="tooltip" title="Antecedentes Personales" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">assignment_ind</i></a>';
                    })->make(true);
    }

}

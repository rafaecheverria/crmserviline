<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Query;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitasMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = User::select(['id', 'nombres', 'apellidos'])->withRole('doctor')->orderBy('apellidos', 'asc')->get();
        $pacientes = User::select(['id', 'nombres', 'apellidos'])->withRole('paciente')->orderBy('apellidos', 'asc')->get();
        //var_dump($users);
        return view('citas_medicas.index',compact('doctores', 'pacientes'));
    }

    public function api()
    {
        $data = Query::join('users', 'queries.paciente_id', '=', 'users.id')
            ->select('users.nombres as title', 'queries.fecha_inicio as start', 'queries.fecha_fin as end', 'queries.color as color')
            ->get();
        return Response()->json($data);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $new_cita = new Query();
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

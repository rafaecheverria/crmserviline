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
        return view('citas_medicas.index');
    }

    public function api()
    {
        
        $data = Query::join('users', 'queries.paciente_id', '=', 'users.id')
            ->select('users.nombres as title', 'queries.fecha_inicio as start')
            ->get();
        return Response()->json($data);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {

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

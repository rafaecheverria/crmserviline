<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Query;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->hasRole('doctor')) {
            $data = Query::join('users', 'queries.paciente_id', '=', 'users.id')
            ->select('users.nombres as title', 'queries.doctor_id as doctor_id', 'queries.paciente_id as paciente_id', 'queries.descripcion as descripcion', 'queries.id as id', 'queries.fecha_inicio as start', 'queries.fecha_fin as end', 'queries.color as color')
            ->where('doctor_id', Auth::user()->id)->get();
        }else{
             $data = Query::join('users', 'queries.paciente_id', '=', 'users.id')
            ->select('users.nombres as title', 'queries.doctor_id as doctor_id', 'queries.paciente_id as paciente_id', 'queries.descripcion as descripcion', 'queries.id as id', 'queries.fecha_inicio as start', 'queries.fecha_fin as end', 'queries.color as color')
            ->get();
        }
        
        return Response()->json($data);
    }
    public function store(Request $request)
    {
        if($request->ajax()){
            $cita = new Query($request->all());
            if (Auth::user()->hasRole('doctor')) {
               $cita->doctor_id = Auth::user()->id;
            }else{
                $cita->doctor_id = $request->doctor_id;
            }
            $cita->fecha_inicio = $request->fecha_inicio . " " . $request->hora_inicio;
            $cita->fecha_fin = $request->fecha_inicio . " " . $request->hora_fin;
            $cita->estado = 'pendiente';
            $cita->color = '#298A08';
            $cita->unity_id = 1;
            $cita->save();
            return response()->json([
                "message" => "La cita ha sido reservada correctamente"
                ]);
        }
    }
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $cita = Query::findOrFail($id);
            $cita->fill($request->all());
            if (Auth::user()->hasRole('doctor')) {
               $cita->doctor_id = Auth::user()->id;
            }else{
                $cita->doctor_id = $request->doctor_id;
            }
            $cita->fecha_inicio = $request->fecha_inicio . " " . $request->hora_inicio;
            $cita->fecha_fin    = $request->fecha_inicio . " " . $request->hora_fin;
            $cita->save(); 
            return response()->json([
                "message" => "La cita ha sido actualizada correctamente"
                ]);
           
        }
    }
    public function destroy($id)
    {
        $cita = Query::findOrFail($id);
        Query::destroy($id);
        return response()->json([
            'success' => true,
            "message" => "La cita ha sido eliminada correctamente."
        ]);
    }
}

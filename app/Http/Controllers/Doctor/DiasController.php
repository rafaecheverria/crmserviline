<?php

namespace App\Http\Controllers\Doctor;

use App\Dias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiasController extends Controller
{

    public function dias($id)
        {
            $data = Dias::join('users', 'dias.doctor_id', '=', 'users.id')
            ->select('users.nombres as title', 'dias.doctor_id as doctor_id', 'dias.observacion as observacion', 'dias.id as id', 'dias.fecha_inicio as start', 'dias.fecha_fin as end', 'dias.color as color')
            ->where('dias.doctor_id', $id)->get();
            return Response()->json($data);
    }
    public function store(Request $request)
    {
        if($request->ajax()){

            $reserva_ocupada = "";
            $dia = new Dias($request->all());
            $Finicio = Date::parse($request->fecha_inicio)->format('Y-m-d');
            $dia->fecha_inicio = $Finicio . " " . $request->hora_inicio;
            $dia->fecha_fin    = $Finicio . " " . $request->hora_fin;
            $query_dias = Dias::where('doctor_id', '=', $request->doctor_id)->count();
            if ($query_dias > 0) {
                return response()->json([
                "success" => false,
                "message" => "El doctor ya tiene este dia disponible para agendar citas",
                ]);
            }else{
                $dia = new Query($request->all());
                $Finicio = Date::parse($request->fecha_inicio)->format('Y-m-d');
                $dia->fecha_inicio = $Finicio . " " . $request->hora_inicio;
                $dia->fecha_fin    = $Finicio . " " . $request->hora_fin;
                $dia->doctor_id    = $request->doctor_id;
                $dia->color        = '#298A08';
                $dia->save();
                return response()->json([
                    "success"      => true,
                    "message"      => "Se asignó este día para agendar citas",
                    "reserva"      => $reservas,
                    "doctor"       => $cita->doctor_id,
                    "especialidad" => $cita->speciality_id,
                ]);
            }
        }
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

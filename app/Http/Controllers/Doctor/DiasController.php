<?php

namespace App\Http\Controllers\Doctor;

use App\Dias;
use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiasController extends Controller
{

    public function dias($id)
    {
        $data = Dias::join('users', 'dias.doctor_id', '=', 'users.id')
        ->select('users.nombres as title', 'dias.doctor_id as doctor_id', 'dias.observacion as observacion', 'dias.id as id', 'dias.fecha_inicio as start', 'dias.fecha_fin as end', 'dias.color as color')
        ->where('dias.doctor_id', $id)->get();
        $data->title = "hola";
        return Response()->json($data);
    }
    public function store(Request $request)
    {
        if($request->ajax()){
            $dia = new Dias($request->all());
            $Finicio = Date::parse($request->fecha_inicio)->format('Y-m-d');
            $dia->fecha_inicio = $Finicio . " " . $request->hora_inicio;
            $dia->fecha_fin    = $Finicio . " " . $request->hora_fin;
            $query_dias = Dias::where('fecha_inicio', '=', $dia->fecha_inicio)->where('doctor_id', '=', $request->doctor_id)->count();
            if ($query_dias > 0) {
                return response()->json([
                "success" => false,
                "message" => "El doctor ya tiene habilitado este día para agendar citas",
                ]);
            }else{
                $dia = new Dias($request->all());
                $Finicio = Date::parse($request->fecha_inicio)->format('Y-m-d');
                $dia->fecha_inicio = $Finicio . " " . $request->hora_inicio;
                $dia->fecha_fin    = $Finicio . " " . $request->hora_fin;
                $dia->doctor_id    = $request->doctor_id;
                $dia->color        = '#298A08';
                $dia->title        = "Disponible";
                $dia->save();
                return response()->json([
                    "success"      => true,
                    "message"      => "Se asignó este día para agendar citas",
                    "doctor"       => $dia->doctor_id,
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

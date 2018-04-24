<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use App\Query;
use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpedienteController extends Controller
{
    public function show($id)
    {
        $paciente = User::findOrFail($id);
        $queries = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
                        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
                        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
                        ->select(['queries.id as id', 'queries.fecha_inicio as fecha', 'queries.sintomas as sintomas', 'queries.examenes as examenes', 'queries.tratamiento as tratamiento', 'queries.observaciones as observaciones', 'paciente.nombres as nombres_paciente', 'paciente.apellidos as apellidos_paciente', 'doctor.nombres as nombres_doctor', 'doctor.apellidos as apellidos_doctor', 'especialidad.nombre as especialidad'])
                        ->where('queries.paciente_id', '=', $paciente->id)->where('queries.estado', '=', 'atendido')->get();

        $arreglo = array();
        foreach($queries as $t){
            $arreglo[] = Date::parse($t->fecha)->toFormattedDateString();
            } 
        $fecha = collect($arreglo);

        return response()->json([
           "array"    => $queries,
           "fecha"    => $fecha,
           "paciente" => $paciente->nombres . " " . $paciente->apellidos,
        ]);
    }
}

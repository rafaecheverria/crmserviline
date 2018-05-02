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
                        ->where('queries.paciente_id', '=', $paciente->id)->where('queries.estado', '=', 'atendido')->orderBy('queries.fecha_inicio', 'desc')->get();

        $arreglo = array();
        foreach($queries as $t){
            $arreglo[] = Date::parse($t->fecha)->toFormattedDateString();
            } 
        $fecha = collect($arreglo);

        return response()->json([
           "array"    => $queries,
           "fecha"    => $fecha,
           "paciente" => $paciente->nombres . " " . $paciente->apellidos,
           "paciente_id" => $paciente->id,
        ]);
    }

    public function reporte($id)
    {
        $paciente       = User::findOrFail($id);
        $edad           = Carbon::parse($paciente->nacimiento)->age;
        $query_paciente = Query::select(['id', 'sintomas', 'examenes', 'tratamiento', 'observaciones', 'estado', 'fecha_inicio'])->where('estado', '=' , 'atendido')->where('paciente_id', '=', $paciente->id)->orderBy('queries.fecha_inicio', 'desc')->get();
       $query_paciente->fecha_inicio = "9 de mayo";
        $fecha          = Date::now()->toFormattedDateString();
        $pdf            = \PDF::loadView('pacientes.pdf_expediente', ['paciente' => $paciente, 'edad' => $edad, 'fecha' => $fecha, 'query_paciente' => $query_paciente]);
        return $pdf->download($paciente->nombres ." ". $paciente->apellidos.".pdf");
    }
}

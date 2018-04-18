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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*$consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad', 'queries.estado as estado'])->where('queries.estado', '=' , 'pendiente');*/
        //Page::where('about', '=' ,'data')->firstOrFail();
        $paciente = User::findOrFail($id);
        //$queries = Query::where('queries.paciente_id', '=', $paciente->id)->get();
        $queries = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
                        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
                        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
                        ->select(['queries.id as id', 'queries.fecha_inicio as fecha', 'queries.sintomas as sintomas', 'queries.examenes as examenes', 'queries.tratamiento as tratamiento', 'queries.observaciones as observaciones', 'paciente.nombres as nombres_paciente', 'paciente.apellidos as apellidos_paciente', 'doctor.nombres as nombres_doctor', 'doctor.apellidos as apellidos_doctor', 'especialidad.nombre as especialidad'])
                        ->where('queries.paciente_id', '=', $paciente->id)->get();

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


        

        /*$consulta = User::findOrFail($id)->queries;*/

        /*return response()->json([
            'success'      => true,
            'fecha'        => Carbon::parse($consulta->fecha_inicio)->format('d-m-Y'),
            'doctor'       => $consulta->doctor_id,
            'paciente'     => $consulta->paciente_id,
            'especialidad' => $consulta->speciality_id,
            'sintomas'     => $consulta->sintomas,
            'examenes'     => $consulta->examenes,
            'tratamiento'  => $consulta->tratamiento,
            'observaciones'=> $consulta->observaciones,
        ]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use Jenssegers\Date\Date;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FichaPacienteController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reporte($id)
    {
        $pacientes = User::findOrFail($id);
        $edad = Carbon::parse($pacientes->nacimiento)->age;
        $fecha = Date::now()->toFormattedDateString();
        $pdf = \PDF::loadView('pacientes.pdf_ficha', ['pacientes' => $pacientes, 'edad' => $edad, 'fecha' => $fecha]);
        return $pdf->download($pacientes->nombres ." ". $pacientes->apellidos.".pdf");
    }

    public function show($id)
    {
        $paciente = User::findOrFail($id);
        $edad     = $paciente->getYearsAttribute();
        //$edad = $paciente->nacimiento->diffInYears(now());
        return response()->json([
            'success'     => true,
            'id'          => $paciente->id,
            'avatar'      => $paciente->avatar,
            'rut'         => $paciente->rut,
            'nombres'     => $paciente->nombres . " " . $paciente->apellidos,
            'edad'        => $edad,
            'email'       => $paciente->email,
            'telefono'    => $paciente->telefono,
            'genero'      => $paciente->genero,
            'direccion'   => $paciente->direccion,
            'sangre'      => $paciente->sangre,
            'vih'         => $paciente->vih,
            'peso'        => $paciente->peso,
            'altura'      => $paciente->altura,
            'alergia'     => $paciente->alergia,
            'medicamento' => $paciente->medicamento_actual,
            'enfermedad'  => $paciente->enfermedad,
        ]);
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

<?php

namespace App\Http\Controllers\Paciente;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AntecedenteController extends Controller
{
    public function edit($id)
    {
        $paciente = User::findOrFail($id);
       
        return response()->json([
            'success'            => true,
            'id'                 => $paciente->id,
            'sangre'             => $paciente->sangre,
            'vih'                => $paciente->vih,
            'peso'               => $paciente->peso,
            'altura'             => $paciente->altura,
            'alergia'            => $paciente->alergia,
            'medicamento'        => $paciente->medicamento_actual,
            'enfermedad'         => $paciente->enfermedad,
            'nombres'            => $paciente->nombres,
            'apellidos'          => $paciente->apellidos
        ]);
    }
    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->sangre = $request->sangre;
            $user->vih = $request->vih;
            $user->peso = $request->peso;
            $user->altura = $request->altura;
            $user->alergia = $request->alergia;
            $user->medicamento_actual = $request->medicamento;
            $user->enfermedad = $request->enfermedad;
            $user->save();
            return response()->json([
             "apellidos" => $user->apellidos,
             "message" => "Los antecedentes del paciente ".$user->apellidos." han sido guardados correctamente !"
            ]);
        }
    }
}

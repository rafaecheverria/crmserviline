<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EspecialidadDoctorController extends Controller
{
    public function edit(Request $request, $id)
    {
        if($request->ajax()) {
        $doctor = User::findOrFail($id);
        $especialidades = Speciality::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $my_especialidades = $doctor->specialities->pluck('id')->ToArray();
        
            return response()->json([
                'rut'                       => $doctor->rut,
                'id'                        => $doctor->id,
                'nombres'                   => $doctor->nombres . " " . $doctor->apellidos,
                'apellidos'                 => $doctor->apellidos,
                'avatar'                    => $doctor->avatar,
                'estudios_complementarios'  => $doctor->estudios_complementarios,
                'especialidades'            => $especialidades,
                'my_especialidades'         => $my_especialidades
            ]);
        } 
    }

     public function getEspecialidad(Request $request, $id)
    {
        if ($request->ajax()) {
            $especialidades = Speciality::especialidades($id);
            return response()->json($especialidades);
        }
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $doctor = User::findOrFail($id);
            $doctor->estudios_complementarios = $request->estudios_complementarios;
            $doctor->specialities()->sync($request->especialidades_doctor); 
            $doctor->save();
            return response()->json([
                "apellidos" => $doctor->apellidos,
                "message" => "Las especialidades del Dr. ".$doctor->apellidos." se han actualizado correctamente !"
                ]);
           
        }
    }
}

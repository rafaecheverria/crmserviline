<?php

namespace App;
use App\User;
use App\Speciality;

class Doctor extends User
{
	/*public static function carga_especialidades($id)
    {
        $doctor = User::findOrFail($id);
        $especialidades = Speciality::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $my_especialidades = $doctor->specialities->pluck('id')->ToArray();
        
        return response()->json([
            'rut'              => $doctor->rut,
            'id'               => $doctor->id,
            'nombres'          => $doctor->nombres,
            'apellidos'        => $doctor->apellidos,
            'avatar'     	   => $doctor->avatar,
            'especialidades'   => $especialidades,
            'my_especialidades'=> $my_especialidades
        ]);
    }	*/
}

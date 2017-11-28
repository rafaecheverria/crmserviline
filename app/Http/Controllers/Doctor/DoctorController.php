<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class DoctorController extends ApiController
{
    public function index()// Lista todos los doctores
    {
       return view('doctores.index'); 
    }

    public function get_doctor(User $user) //obtiene la información del doctor con el parametro buscar
    {
    	//$personas = $user->withRole('paciente')->get();
       //$personas = datatables::eloquent($user->query())->make(true)->withRole('doctor')->get();
      //return datatables()->eloquent($user->withRole('administrador'))->make(true);
       return datatables()->eloquent($user->query()->withRole('doctor'))->make(true);
       //return datatables(User::all())->toJson();
       //return response()->json('doctores.index', compact('personas'));
       //return view('doctores.index', compact('personas'));
       //return response()->json($personas);
    }
}

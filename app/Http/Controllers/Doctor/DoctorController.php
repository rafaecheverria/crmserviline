<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DoctorController extends ApiController
{
    public function index(User $user, Request $request)// Lista todos los doctores
    {
        $personas = $user->withRole('doctor')->paginate(5);
        if ($request->ajax()) {
        		return response()->json(view('doctores.list_doctor', compact('personas'))->render());
        }
        return view('doctores.index', compact('personas'));
    }

    public function get_doctor_info_by_search(Request $request) //obtiene la información del docto con el parametro buscar
    {
    	if ($request->ajax()) {

    		$personas = $this->data($request->buscar);
    		if (count($personas)>0) {
    			$buscar = $request->buscar;
    			$view = view('doctores.list_doctor',compact('pesonas', 'buscar'))->render();
    			return response($view);
    		}
    	}
    }

    public function store(Request $request)
    {
    	    $personas = $this->data($request->buscar);
    		return response()->json(view('doctores.list_doctor', compact('personas'))->render());
    	/*if ($request->ajax()) 
    	{
    		$personas = $this->data($request->buscar);
    		return response()->json(view('doctores.list_doctor', compact('personas'))->render());	
    	}*/
    }

    public function data($buscar) //busca la información del dosctor con el parametro buscar -> realiza la consulta a la base de datos 
    {
    	$personas =User::Buscar($request->buscar)->withRole('doctor')->paginate(5);

    	return response()->json(view('doctores.list_doctor', compact('personas')));
    }

}

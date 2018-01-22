<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Speciality;
use App\Doctor;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DoctorController extends ApiController
{
    public function index()// Lista todos los doctores
    {
       return view('doctores.index'); 
    }

    public function show() //obtiene la información del doctor con el parametro buscar
    {
        $users = User::select(['id', 'rut', 'nombres', 'apellidos', 'email'])->withRole('doctor');
        return datatables()->eloquent($users)
            ->addColumn('action', function ($user) {
                return '<a href="doctores/'.$user->id.'/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">description</i></a>
                        <a href="doctores/'.$user->id.'/edit" id="update"  class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>
                        <a href="#" onclick="eliminar_doc('.$user->id.')" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';
            })
            ->make(true);
    }

    public function create()
    {
        $especialidades = Speciality::get()->pluck('nombre', 'id');
        return view('doctores.create', compact('especialidades'));
    }

    public function store(CreateUserRequest $request)
    {
        
        if($request->ajax()){
            $user = new User($request->all());
            $user->save();
            $user->specialities()->sync($request->especialidad);
            $user->attachRole(2);
            return response()->json([
                "message" => "los registros del doctor ".$user->apellidos." se han registrado correctamente !"
                ]);
        }
    }

    public function edit($id)
    {
        $doctor = User::findOrFail($id);
        $specialities = Speciality::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $my_speciality = $doctor->specialities->pluck('id')->ToArray();
        return view('doctores.edit', compact('doctor', 'specialities', 'my_speciality'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->save();
            $user->specialities()->sync($request->especialidad);    
            return response()->json([
                "apellidos" => $user->apellidos,
                "message" => "los registros del doctor ".$user->apellidos." se han actualizado correctamente !"
                ]);
           
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return response()->json([
            'success' => true,
            "message" => "los registros del doctor ".$user->apellidos." han sido eliminados correctamente !"
        ]);
    }
}
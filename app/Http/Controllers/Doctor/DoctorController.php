<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Speciality;
use App\Doctor;
use App\Query;
use Illuminate\Support\Carbon;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DoctorController extends ApiController
{
    public function index()// Lista todos los doctores
    {
       $especialidades = Speciality::all(); //envía todas las especialidades que serán cargadas en el select multiple "especialidades" del modal "agregar" del módulo "doctor".
       return view('doctores.index', compact('especialidades'));

    }

    public function show() //obtiene la información del doctor con el parametro buscar
    {
        

        $doctores = User::select(['id', 'rut', 'nombres', 'apellidos', 'email'])->withRole('doctor');
        return datatables()->eloquent($doctores)
            ->addColumn('action', function ($doctor) {
                $dias = '<a href="#" onclick="getDias('.$doctor->id.')" data-toggle="modal" data-target="#modal_dias" rel="tooltip" title="Agendar días" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">today</i></a>';

                $clave = '<a href="#" onclick="getClave('.$doctor->id.')" data-toggle="modal" data-target="#modal_clave" rel="tooltip" title="Resetear contraseña" class="btn btn-simple btn-primary btn-icon edit"><i class="material-icons">vpn_key</i></a>';

                $especialidad = '<a href="#" onclick="especialidad_doctor('.$doctor->id.')" data-toggle="modal" data-target="#modal_especialidades" rel="tooltip" title="Especialidades" class="btn btn-simple btn-info btn-icon edit"><i class="material-icons">recent_actors</i></a>';

                $editar ='<a href="#" onclick="carga_usuario('.$doctor->id.')" data-toggle="modal" data-target="#modal_editar_doctor" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';

                $eliminar ='<a href="#" onclick="delete_doctor('.$doctor->id.')"  data-toggle="modal" data-target="#eliminar_doctor" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';

                    return $dias.$clave.$especialidad.$editar.$eliminar;
            })
            ->make(true);
    }


    public function create()
    {
        $especialidades = Speciality::get()->pluck('nombre', 'id');
        return view('doctores.create', compact('especialidades'));
    }

    public function getDoctor(Request $request, $id)
    {
        if ($request->ajax()) {
            $doctores = User::doctores($id);
            return response()->json($doctores);
        }
    }

    public function store(CreateUserRequest $request)
    {
        if($request->ajax()){
            $doctor = new User();
            $doctor->rut                = $request->rut_add;
            $doctor->nombres            = $request->nombres_add;
            $doctor->apellidos          = $request->apellidos_add;
            $doctor->nacimiento         = Carbon::parse($request->nacimiento_add)->format('Y-m-d');
            $doctor->email              = $request->email_add;
            $doctor->telefono           = $request->telefono_add;
            $doctor->direccion          = $request->direccion_add;
            $doctor->genero             = $request->genero_add;
            $doctor->avatar             = "default.jpg";
            $doctor->save();
            $doctor->attachRole(2); //2 es el numero id del rol doctor
            return response()->json([
                "tipo" => "doctor",
                "message" => "El doctor ".$doctor->nombres." ".$doctor->apellidos." ha sido guardado exitosamente !"
                ]);
        }
    }

    public function edit($id)
    {
        $doctor = User::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $doctor->id,
            'avatar'      => $doctor->avatar,
            'nombres'     => $doctor->nombres,
            'apellidos'   => $doctor->apellidos,
            'nacimiento'  => Carbon::parse($doctor->nacimiento)->format('d-m-Y'),
            'genero'      => $doctor->genero,
            'email'       => $doctor->email,
            'telefono'    => $doctor->telefono,
            'direccion'   => $doctor->direccion,
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if($request->ajax()){
            $doctor = User::findOrFail($id);
            $doctor->nombres            = $request->nombres;
            $doctor->apellidos          = $request->apellidos;
            $doctor->nacimiento         = Carbon::parse($request->nacimiento_e)->format('Y-m-d');
            $doctor->email              = $request->email;
            $doctor->telefono           = $request->telefono;
            $doctor->direccion          = $request->direccion;
            $doctor->genero             = $request->genero;
            $doctor->save();
            return response()->json([
             "tipo" => "doctor",
             "apellidos" => $doctor->apellidos,
             "message" => "El doctor ".$doctor->nombres." ".$doctor->apellidos." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Query::where('doctor_id', $id)->count();
        if ($query > 0) {
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero el doctor que desea eliminar cuenta con historial clínico!",
                "type"    => 'warning'
            ]);
        }else{
            $user = User::findOrFail($id);
            User::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "El Dr. ".$user->apellidos." ha sido elimindado correctamente !",
                "type"    => 'success'

            ]);
        }
    }
}
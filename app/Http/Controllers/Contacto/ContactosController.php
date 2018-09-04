<?php

namespace App\Http\Controllers\Contacto;

use App\User;
use App\Role;
use App\Query;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidatePacienteRequest;
use App\Http\Requests\ValidateAddPacienteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactosController extends Controller
{
    public function index()
    {
        return view('contactos.index');
    }

    public function store(ValidateAddPacienteRequest $request)
    {
        if($request->ajax()){
            $contacto = new User();
            $contacto->rut                = $request->rut_add;
            $contacto->nombres            = $request->nombres_add;
            $contacto->apellidos          = $request->apellidos_add;
            $contacto->nacimiento         = Carbon::parse($request->nacimiento_add)->format('Y-m-d');
            $contacto->email              = $request->email_add;
            $contacto->telefono           = $request->telefono_add;
            $contacto->direccion          = $request->direccion_add;
            $contacto->genero             = $request->genero_add;
            $contacto->sangre             = $request->sangre_add;
            $contacto->vih                = $request->vih_add;
            $contacto->peso               = $request->peso_add;
            $contacto->altura             = $request->altura_add;
            $contacto->alergia            = $request->alergia_add;
            $contacto->medicamento_actual = $request->medicamento_add;
            $contacto->enfermedad         = $request->enfermedad_add;
            $contacto->avatar             = "default.jpg";
            $contacto->save();
            $contacto->attachRole(4); //4 es el numero id del rol paciente
            return response()->json([
                "message" => "El paciente ".$paciente->nombres." ".$paciente->apellidos." ha sido guardado exitosamente !"
                ]); 
        }
    }

    public function show()
    {
        $users = User::select(['id', 'rut', 'nombres', 'apellidos', 'telefono', 'nacimiento']);
        return  datatables()->of($users)
                ->editColumn('nacimiento', function ($user) {
                 return $user->getYearsAttribute();
                    })
                    ->addColumn('action', function ($user) {
                        $ficha = '<a href="#" onclick="ficha_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $expediente = '<a href="#" onclick="expediente_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_expediente" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>';
                        $editar = '<a href="#" onclick="carga_paciente('.$user->id.')" data-toggle="modal" data-target="#modal_editar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="delete_paciente('.$user->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$expediente.$editar.$eliminar;
                       
                    })->make(true);
    }

    public function edit($id)
    {
        $paciente = User::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $paciente->id,
            'avatar'      => $paciente->avatar,
            'rut'         => $paciente->rut,
            'nombres'     => $paciente->nombres,
            'apellidos'   => $paciente->apellidos,
            'nacimiento'  => Carbon::parse($paciente->nacimiento)->format('d-m-Y'),
            'genero'      => $paciente->genero,
            'email'       => $paciente->email,
            'telefono'    => $paciente->telefono,
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

     public function update(ValidatePacienteRequest $request, $id)
    {
        if($request->ajax()){
            $user = User::findOrFail($id);
            $user->nombres            = $request->nombres_e;
            $user->apellidos          = $request->apellidos_e;
            $user->nacimiento         = Carbon::parse($request->nacimiento_e)->format('Y-m-d');
            $user->email              = $request->email_e;
            $user->telefono           = $request->telefono_e;
            $user->direccion          = $request->direccion_e;
            $user->genero             = $request->genero_e;
            $user->sangre             = $request->sangre_e;
            $user->vih                = $request->vih_e;
            $user->peso               = $request->peso_e;
            $user->altura             = $request->altura_e;
            $user->alergia            = $request->alergia_e;
            $user->medicamento_actual = $request->medicamento_e;
            $user->enfermedad         = $request->enfermedad_e;
            $user->save();
            return response()->json([
             "apellidos" => $user->apellidos,
             "message" => "El paciente ".$user->nombres." ".$user->apellidos." ha sido actualizado correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Query::where('paciente_id', $id)->count();
        if ($query > 0) {
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero el paciente que desea eliminar cuenta con historial clínico!",
                "type"    => 'warning'
            ]);
        }else{
            $user = User::findOrFail($id);
            User::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "los registros del paciente ".$user->apellidos." han sido eliminados correctamente !",
                "type"    => 'success'

            ]);
        }
        
    }
}

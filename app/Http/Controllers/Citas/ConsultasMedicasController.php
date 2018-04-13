<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Query;
use App\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ConsultasMedicasController extends Controller
{
    public function index()
    {
        $doctores = User::select(['id', 'nombres', 'apellidos'])->withRole('doctor')->orderBy('apellidos', 'asc')->get();
        $pacientes = User::select(['id', 'nombres', 'apellidos'])->withRole('paciente')->orderBy('apellidos', 'asc')->get();
        $especialidades = Speciality::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
        $cantidad_pacientes = User::withRole('paciente')->count();
        $reservas = Query::where('estado', 'pendiente')->count();
        return view('consultas_medicas.index',compact('doctores', 'pacientes', 'cantidad_pacientes', 'reservas', 'especialidades'));
    }

    public function show()
    {
       $consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad', 'queries.estado as estado'])->where('queries.estado', '=' , 'pendiente');
            
        //$users = User::select(['id', 'nombres', 'apellidos', 'nacimiento'])->withRole('paciente');
        return  datatables()->of($consultas)
            ->editColumn('paciente', function ($consulta) {
                return ucwords($consulta->apellidos. ' ' .$consulta->paciente);
            })
            ->editColumn('doctor', function ($consulta) {
                return ucwords('Dr. '.$consulta->doctor);
            })
            ->editColumn('fecha_inicio', function ($consulta) {
                return $consulta->getYearsAttribute();
            })
            ->addColumn('action', function ($consulta) {
                $atender = '<a href="#" onclick="atender('.$consulta->id.')" data-toggle="modal" data-target="#modal_atender" rel="tooltip" title="Atender" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">done_all</i></a>';
                $editar = '<a href="#" onclick="update_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#update_cita_pendiente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                $eliminar = '<a href="#" onclick="delete_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                return $atender.$editar.$eliminar;
            })->make(true);
    }

    public function carga_atendidos()
    {
       $consultas = Query::join('users as paciente', 'queries.paciente_id', '=', 'paciente.id')
        ->join('users as doctor', 'queries.doctor_id', '=', 'doctor.id')
        ->join('specialities as especialidad', 'queries.speciality_id', '=', 'especialidad.id')
        ->select(['queries.id as id', 'queries.fecha_inicio', 'paciente.nombres as paciente', 'paciente.apellidos as apellidos', 'doctor.apellidos as doctor', 'especialidad.nombre as especialidad'])->where('queries.estado', '=' , 'atendido');
            
        //$users = User::select(['id', 'nombres', 'apellidos', 'nacimiento'])->withRole('paciente');
        return  datatables()->of($consultas)
            ->editColumn('paciente', function ($consulta) {
                return ucwords($consulta->apellidos. ' ' .$consulta->paciente);
            })
            ->editColumn('doctor', function ($consulta) {
                return ucwords('Dr. '.$consulta->doctor);
            })
            ->editColumn('fecha_inicio', function ($consulta) {
                return $consulta->getYearsAttribute();
            })
            ->addColumn('action', function ($consulta) {
                $editar = '<a href="#" onclick="cargar_consulta_atendida('.$consulta->id.')" data-toggle="modal" data-target="#modal_carga_atendida" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                $eliminar = '<a href="#" onclick="delete_cita_pendiente('.$consulta->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';
                return $editar.$eliminar;
            })->make(true);
    }

    public function atender(Query $queries, User $users, $id)
    {
        $atender =   $queries->findOrFail($id);
        $paciente =  $users->findOrFail($atender->paciente_id);
        $visitas =   $queries->all()->where('paciente_id', '=', $atender->paciente_id)->where('estado', '=', 'atendido')->count();
        return response()->json([
                'success' => true,
                "paciente" => $paciente->nombres . ' '. $paciente->apellidos,
                "edad"    => $paciente->getYearsAttribute(),
                "visitas" => $visitas,
                "id"      => $atender->id
            ]);
    }

    public function edit(Query $queries, User $users, $id) //carga los datos al formulario modal de citas pendientes en el modulo "consultas medicas"
    {

        $cita_atendida = $queries->findOrFail($id);
        $paciente =  $users->findOrFail($cita_atendida->paciente_id);
         $visitas =   $queries->all()->where('paciente_id', '=', $cita_atendida->paciente_id)->where('estado', '=', 'atendido')->count();
           return response()->json([
            'success'      => true,
            'id'           => $cita_atendida->id,
            'paciente'     => $paciente->nombres . ' '. $paciente->apellidos,
            'edad'         => $paciente->getYearsAttribute(),
            'visitas'      => $visitas,
            'sintomas'     => $cita_atendida->sintomas,
            'examenes'     => $cita_atendida->examenes,
            'tratamiento'  => $cita_atendida->tratamiento,
            'observacion'  => $cita_atendida->observaciones,
        ]);
    }

    public function update(Query $queries,Request $request,$id)
    {
        if($request->ajax()){
            $consulta = $queries->findOrFail($id);
            $consulta->color         = '#1a4483';
            $consulta->estado        = 'atendido';
            $consulta->sintomas      = $request->sintomas;
            $consulta->examenes      = $request->examenes;
            $consulta->tratamiento   = $request->tratamiento;
            $consulta->observaciones = $request->observacion;
            $consulta->save();
            return response()->json([
             "message" => "La consulta médica se ha guardado exitosamente!"
            ]);
        }
    }

}

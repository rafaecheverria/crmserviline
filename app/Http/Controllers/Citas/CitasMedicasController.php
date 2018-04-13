<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Query;
use App\Speciality;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCitaRequest;
use App\Http\Controllers\Controller;

class CitasMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = User::select(['id', 'nombres', 'apellidos'])->withRole('doctor')->orderBy('apellidos', 'asc')->get();
        $pacientes = User::select(['id', 'nombres', 'apellidos'])->withRole('paciente')->orderBy('apellidos', 'asc')->get();
        $especialidades = Speciality::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
        $cantidad_pacientes = User::withRole('paciente')->count();
        $reservas = Query::where('estado', 'pendiente')->count();
        return view('citas_medicas.index',compact('doctores', 'pacientes', 'cantidad_pacientes', 'reservas', 'especialidades'));
    }

    public function api()
    {
        if (Auth::user()->hasRole('doctor')) {
            $data = Query::join('users', 'queries.paciente_id', '=', 'users.id')
            ->select('users.nombres as title', 'queries.doctor_id as doctor_id', 'queries.paciente_id as paciente_id', 'queries.descripcion as descripcion', 'queries.id as id', 'queries.fecha_inicio as start', 'queries.fecha_fin as end', 'queries.color as color', 'queries.estado as estado')
            ->where('doctor_id', Auth::user()->id)->get();
        }else{
             $data = Query::join('users', 'queries.paciente_id', '=', 'users.id')
             ->join('specialities', 'queries.speciality_id' , '=', 'specialities.id')
             ->select('users.nombres as title', 'queries.speciality_id as speciality_id', 'queries.doctor_id as doctor_id', 'queries.paciente_id as paciente_id', 'queries.descripcion as descripcion', 'queries.id as id', 'queries.fecha_inicio as start', 'queries.fecha_fin as end', 'queries.color as color', 'queries.estado as estado')
            ->get();
        }
        
        return Response()->json($data);
    }
    public function store(CreateCitaRequest $request)
    {
        if($request->ajax()){
            $cita = new Query($request->all());
            if (Auth::user()->hasRole('doctor')) {
               $cita->doctor_id = Auth::user()->id; //inserta el doctor en sesión
               $cita->speciality_id = Auth::user()->speciality_id; //inserta especialidad del usuario en sesión
            }else{
                $cita->doctor_id = $request->doctor_id; //inserta el doctor del formulario.
                $cita->speciality_id = $request->speciality_id;
            }
            $Finicio = Carbon::parse($request->fecha_inicio)->format('Y-m-d');
            $cita->fecha_inicio = $Finicio . " " . $request->hora_inicio;
            $cita->fecha_fin    = $Finicio . " " . $request->hora_fin;
            $cita->estado       = 'pendiente';
            $cita->color        = '#298A08';
            $cita->unity_id     = 1;
            $cita->save();
            $reservas = Query::where('estado', 'pendiente')->count();
            return response()->json([
                "message"      => "La cita ha sido reservada correctamente",
                "reserva"      => $reservas,
                "doctor"       => $cita->doctor_id,
                "especialidad" => $cita->speciality_id
                ]);
        }
    }

    public function edit(Query $queries, $id) //carga los datos al formulario modal de citas pendientes en el modulo "consultas medicas"
    {
        $cita_pendiente = $queries->findOrFail($id);
        //$especialidad = $cita_pendiente->speciality_id;
           return response()->json([
            'success'      => true,
            'id'           => $cita_pendiente->id,
            'fecha_inicio' => Carbon::parse($cita_pendiente->fecha_inicio)->format('d-m-Y'),
            'hora_inicio'  => Carbon::parse($cita_pendiente->fecha_inicio)->format('h:i'), // H:i forma correcta de obtener la hora de un campo date.
            'hora_fin'     => Carbon::parse($cita_pendiente->fecha_fin)->format('h:i'),
            'paciente'     => $cita_pendiente->paciente_id,
            'especialidad' => $cita_pendiente->speciality_id,
            'doctor'       => $cita_pendiente->doctor_id,
            'descripcion'  => $cita_pendiente->descripcion,
        ]);
    }
    public function update(CreateCitaRequest $request, $id)
    {
        if($request->ajax()){
            $cita = Query::findOrFail($id);
            if ($request->type = 'resetdate') {
                $cita->fill($request->all());
            }else{
                $cita->fill($request->all());
                if (Auth::user()->hasRole('doctor')) {
                   $cita->doctor_id = Auth::user()->id;
                   $cita->speciality_id = Auth::user()->speciality_id; // inserta especialidad del usuario en sesión
                }else{
                    $cita->doctor_id = $request->doctor_id;
                    $cita->speciality_id = $request->speciality_id;
                }
                
            }
            $Finicio = Carbon::parse($request->fecha_inicio)->format('Y-m-d');
            $cita->fecha_inicio = $Finicio . " " . $request->hora_inicio;
            $cita->fecha_fin    = $Finicio . " " . $request->hora_fin;
            $cita->save();
            return response()->json([
                "message" => "La cita ha sido actualizada correctamente",
                ]);
        }
    }

    public function destroy($id)
    {
        $cita = Query::findOrFail($id);
        Query::destroy($id);
        $reservas = Query::where('estado', 'pendiente')->count();
        return response()->json([
            'success' => true,
            "message" => "La cita ha sido eliminada correctamente.",
            "reserva" => $reservas
        ]);
    }
}

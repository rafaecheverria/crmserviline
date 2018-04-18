<?php

namespace App\Http\Controllers\Especialidad;

use App\Speciality;
use App\Query;
use App\Http\Requests\ValidaEspecialidadRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EspecialidadController extends Controller
{
    public function index()
    {
        return view('especialidades.index');
    }

     public function store(ValidaEspecialidadRequest $request)
    {
        if($request->ajax()){
            $especialidad = new Speciality($request->all());
            $especialidad->save();
            return response()->json([
                "message" => "La especialidad ".$especialidad->nombre." ha sido guardado exitosamente !"
                ]);
        }
    }

    public function show()
    {
        $especialidades = Speciality::select(['id','nombre']);
        return datatables()->eloquent($especialidades)
            ->addColumn('action', function ($especialidad) {
                $editar ='<a href="#" onclick="cargar_datos_especialidad('.$especialidad->id.')" data-toggle="modal" data-target="#modal_editar_doctor" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                $eliminar ='<a href="#" onclick="delete_especialidad('.$especialidad->id.')"  data-toggle="modal" data-target="#eliminar_especialidad" rel="tooltip" title="Eliminar" class="btn btn-simple btn-danger btn-icon remove-item"><i class="material-icons">close</i></a>';

                     return $editar.$eliminar;
            })
            ->make(true);
    }

    public function edit($id)
    {
        $especialidad = Speciality::findOrFail($id);
        return response()->json([
            'success'     => true,
            'id'          => $especialidad->id,
            'nombre'      => $especialidad->nombre,
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $especialidad = Speciality::findOrFail($id);
            $especialidad->nombre  = $request->nombre;
            $especialidad->save();
            return response()->json([
             "message" => "La especialidad ".$especialidad->nombre." ha sido actualizada correctamente !"
            ]);
        }
    }

    public function destroy($id)
    {
        $query  =  Query::where('speciality_id', $id)->count();
        if ($query > 0) {
           return response()->json([
                'success' => false,
                "message" => "Lo sentimos, pero la especialidad que desea eliminar cuenta con historial clínico!",
                "type"    => 'warning'
            ]);
        }else{
            $especialidad = Speciality::findOrFail($id);
            Speciality::destroy($id);
            return response()->json([
                'success' => true,
                "message" => "La especialidad ".$especialidad->nombre." ha sido elimindada correctamente !",
                "type"    => 'success'

            ]);
        }
    }
}

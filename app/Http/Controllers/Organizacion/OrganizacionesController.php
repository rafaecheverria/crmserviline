<?php

namespace App\Http\Controllers\Organizacion;

use App\Organizacion;
use App\Region;
use App\Ciudad;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizacionesController extends Controller
{
    public function index()
    {
         $regiones = Region::select(['id', 'nombre'])->orderBy('nombre', 'asc')->get();
         $contactos = User::select(['id', 'nombres', 'apellidos'])->withRole("contacto")->orderBy('nombres', 'asc')->get();
        return view('organizaciones.index', compact('regiones', 'contactos'));
    }

     public function getCiudad(Request $request, $id)
    {
        if ($request->ajax()) {
            $ciudades = Ciudad::ciudades($id);
            return response()->json($doctores);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       if($request->ajax()){
            $organizacion = new Organizacion();
            $organizacion->rut         = $request->rut;
            $organizacion->nombre      = $request->nombre; 
            $organizacion->email       = $request->email;
            $organizacion->telefono    = $request->telefono;
            $organizacion->direccion   = $request->direccion;
            $organizacion->tipo        = $request->tipo;
            $organizacion->giro        = $request->giro;
            $organizacion->ciudad_id   = $request->ciudad_id;
            $organizacion->region_id   = $request->region_id;
            $organizacion->logo        = "default.jpg";
            $organizacion->save();
            $organizacion->users()->sync($request->contacto_id);  
            return response()->json([
                "message" => "La empresa ".$organizacion->nombre." ha sido guardada exitosamente!"
                ]);
        }
    }

    public function show()
    {
        $organizaciones = Organizacion::select(['id', 'rut', 'nombre', 'telefono', 'direccion', 'email', 'giro']);
        return  datatables()->of($organizaciones)
                    ->addColumn('action', function ($organizacion) {
                        $ficha = '<a href="#" onclick="ficha_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $expediente = '<a href="#" onclick="expediente_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#modal_expediente" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>';
                        $editar = '<a href="#" onclick="organizacion_user('.$organizacion->id.',  2)" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="delete_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$expediente.$editar.$eliminar;
                       
                    })->make(true);
    }

    public function edit(Request $request, $id)
    {
         if($request->ajax()) {
        $organizacion = Organizacion::findOrFail($id);
        $contactos    = User::withRole('contacto')->orderBy('apellidos', 'DESC')->pluck('nombres', 'id');
        $my_contactos = $organizacion->users->pluck('id')->ToArray();        
        return response()->json([
            'success'      => true,
            'rut'          => $organizacion->rut,
            'id'           => $organizacion->id,
            'nombre'       => $organizacion->nombre,
            'email'        => $organizacion->email,
            'telefono'     => $organizacion->telefono,
            'direccion'    => $organizacion->direccion,
            'giro'         => $organizacion->giro,
            'logo'         => $organizacion->logo,
            'tipo'         => $organizacion->tipo,
            'ciudad_id'    => $organizacion->ciudad_id,
            'region_id'    => $organizacion->region_id,
            'contactos'    => $contactos,
            'my_contactos' => $my_contactos
        ]);
        }
    }

    public function update(Request $request, $id)
    {
        if($request->ajax()){
            $organizacion = Organizacion::findOrFail($id);
            $organizacion->rut         = $request->rut;
            $organizacion->nombre      = $request->nombre; 
            $organizacion->email       = $request->email;
            $organizacion->telefono    = $request->telefono;
            $organizacion->direccion   = $request->direccion;
            $organizacion->tipo        = $request->tipo;
            $organizacion->giro        = $request->giro;
            $organizacion->ciudad_id   = $request->ciudad_id;
            $organizacion->region_id   = $request->region_id;
            $organizacion->save();
            $organizacion->users()->sync($request->contacto_id); 
            return response()->json([
             "nombre" => $organizacion->nombre,
             "message" => "La empresa ".$organizacion->nombre." ha sido actualizada exitosamente!"
            ]);
        }
    }

    public function destroy($id)
    {
        //
    }
}

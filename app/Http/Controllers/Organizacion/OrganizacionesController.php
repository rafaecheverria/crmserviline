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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->ajax()){
            $organizacion = new User();
            $organizacion->rut                = $request->rut_add;
            $organizacion->nombre            = $request->nombre_add; 
            $organizacion->email              = $request->email_add;
            $organizacion->telefono           = $request->telefono_add;
            $organizacion->direccion          = $request->direccion_add;
            $organizacion->tipo               = $request->tipo_add;
            $organizacion->avatar             = "default.jpg";
            $organizacion->save();
            $organizacion->attachRole(2); //2 es el numero id del rol doctor
            return response()->json([
                "tipo" => "doctor",
                "message" => "El doctor ".$doctor->nombres." ".$doctor->apellidos." ha sido guardado exitosamente !"
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $organizaciones = Organizacion::select(['id', 'rut', 'nombre', 'telefono', 'direccion']);
        return  datatables()->of($organizaciones)
                    ->addColumn('action', function ($organizacion) {
                        $ficha = '<a href="#" onclick="ficha_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $expediente = '<a href="#" onclick="expediente_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#modal_expediente" rel="tooltip" title="Expediente" class="btn btn-simple btn-info btn-icon"><i class="material-icons">content_paste</i></a>';
                        $editar = '<a href="#" onclick="carga_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#modal_editar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="delete_paciente('.$organizacion->id.')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$expediente.$editar.$eliminar;
                       
                    })->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Vendedor;

use App\User;
use App\Role;
use App\Query;
use App\Cargo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendedores.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $users = User::obtener_persona_segun_rol("vendedor");
        return  datatables()->of($users)
                ->editColumn('nacimiento', function ($user) {
                 return $user->getYearsAttribute();
                    })
                    ->addColumn('action', function ($user) {
                        $ruta = "contactos/";
                        $ficha = '<a href="#" onclick="ficha('.$user->id.', 1)" data-toggle="modal" data-target="#modal_ficha" rel="tooltip" title="Ficha del paciente" class="btn btn-simple btn-primary btn-icon"><i class="material-icons">folder_shared</i></a>';
                        $editar = '<a href="#" onclick="mostrar_contacto('.$user->id.', 2)" data-toggle="modal" data-target="#modal_editar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>';
                        $eliminar = '<a href="#" onclick="eliminar('.$user->id.',\''.$user->nombre.'\',\''.$ruta.'\')" data-toggle="modal" data-target="#eliminar_paciente" rel="tooltip" title="Editar" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">close</i></a>';

                        return $ficha.$editar.$eliminar;
                       
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

<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
//use Yajra\Datatables\Facades\Datatables;


class DoctorController extends ApiController
{
    public function index()// Lista todos los doctores
    {
       return view('doctores.index'); 
    }

    public function show() //obtiene la información del doctor con el parametro buscar
    {
        $users = User::select(['id', 'rut', 'name', 'last_name', 'phone', 'email']);
        return datatables()->of($users->withRole('doctor'))
            ->addColumn('action', function ($user) {
                return '<a href="doctores/'.$user->id.'/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">description</i></a>
                        <a href="#" onclick="javascript:editar('.$user->id.')" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons">edit</i></a>
                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
            })
            ->editColumn('rut', '{{$rut}}')
            ->make(true);
    }
}
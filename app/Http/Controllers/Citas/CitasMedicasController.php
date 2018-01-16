<?php

namespace App\Http\Controllers\Citas;

use App\User;
use App\Query;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitasMedicasController extends Controller
{
    public function index()
    {
        return view('citas_medicas.index'); 
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}

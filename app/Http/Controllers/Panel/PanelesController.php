<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelesController extends Controller
{
    public function index()
    {
        return view('crm_panel.index');
    }
}

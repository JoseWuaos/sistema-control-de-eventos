<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionarEncargado extends Controller
{
   public function index()
    {
        return view('encargado.index');
    }
    
    public function gestionarEncargado()
    {

        return view('encargado.gestionarEncargado');
    }
}

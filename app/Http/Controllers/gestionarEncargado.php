<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionarEncargado extends Controller
{
    public function gestionarEncargado()
    {
        return view('evento.gestionarEncargado');
    }
}

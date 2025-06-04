<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionarEvento extends Controller
{
     public function gestionarEvento()
    {
        return view('evento.gestionarEvento');
    }
    
}

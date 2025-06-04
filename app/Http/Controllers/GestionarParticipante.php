<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gestionarParticipante extends Controller
{
    public function gestionarParticipante()
    {
        return view('evento.gestionarParticipante');
    }

}

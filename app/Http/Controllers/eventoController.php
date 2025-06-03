<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function menu()
    {
        return view('evento.menu');
    }

    public function evento()
    {
        return view('evento.evento');
    }


   public function layout()
    {
        return view('components.layout');
    }
    
    public function encargado()
    {
        return view('evento.encargado');
    }
    
    public function participante()
    {
        return view('evento.participante');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    
    public function evento()
    {
        // obetner la lista de eventos desde Bd usando postgresql laravel 
        $eventos = Evento::findAll();

        
        return view('evento.evento', compact('eventos'));
    }
    
}

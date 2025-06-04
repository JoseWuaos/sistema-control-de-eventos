<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    
    public function index()
    {
        // obetner la lista de eventos desde Bd usando postgresql laravel 
        $eventos = Evento::findAll();

        
        return view('evento.evento', compact('eventos'));
    }

    public function guardar()
    {
        // obetner la lista de eventos desde Bd usando postgresql laravel 
        $eventos = Evento::findAll();

        
        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente!');
    }
    
}

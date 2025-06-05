<?php

namespace App\Http\Controllers;
use App\Models\Participante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionarParticipante extends Controller
{
  public function index()
{
  $participantes = Participante::all();
   return view('participante.index', compact('participantes'));
}

    public function gestionarParticipante()
    {

        return view('participante.gestionarParticipante');
    }

    public function obtenerParticipantePorCedula($cedula)
    {
        
        $participante = Participante::where('cedula', $cedula)->first();

        if ($participante) {
            return response()->json($participante);
        } else {
            return response()->json(['message' => 'Participante no encontrado'], 404);
        }
    }

}

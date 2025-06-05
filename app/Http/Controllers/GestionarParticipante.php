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

}

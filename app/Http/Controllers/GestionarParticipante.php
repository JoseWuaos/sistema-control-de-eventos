<?php

namespace App\Http\Controllers;
use App\Models\Participante;
use App\Http\Controllers\Controller;
use App\Models\Genero; 
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
        $generos = Genero::all();
      $participantes = Participante::all(); 
        $title = 'Agregar Participante';
        return view('participante.gestionarParticipante');
    }

    public function editar($id)
    {
        $participante = Participante::find($id);
          $generos = Genero::all();
        $title = 'Editar Participante';
        return view('participante.gestionarParticipante', compact('participante', 'title'));
    }
    public function guardar(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'nullable|uuid',
            'cedula' => 'required|string|max:20',
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'primer_apellido' => 'required|string|max:50',
            'segundo_apellido' => 'nullable|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'genero_id' => 'required|uuid|exists:genero,id'
        ]);

        Participante::updateOrCreate(
            ['id' => $request->input('id')],
            $validatedData
        );

        return redirect()->route('participante.index')->with('success', 'Participante guardado exitosamente.');
    }
    public function eliminar($id)
    {
        $participante = Participante::find($id);
        if ($participante) {
            $participante->delete();
            return redirect()->route('participante.index')->with('success', 'Participante eliminado exitosamente.');
        } else {
            return redirect()->route('participante.index')->withErrors(['error' => 'Participante no encontrado.']);

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
}
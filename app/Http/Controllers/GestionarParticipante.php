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
    $participantes = Participante::with('genero')->get(); 
  $participantes = Participante::all();
   return view('participante.index', compact('participantes'));
}

    public function gestionarParticipante()
    {
       $generos = Genero::all(); 
        $title = 'Agregar Participante';
      $participantes = Participante::all(); 
        return view('participante.gestionarParticipante', compact('generos', 'title'));
    }

 public function editar($id)
    {
       
        $participante = Participante::find($id); // Obtener el participante a editar
        $generos = Genero::all(); // Obtener todos los géneros para el campo select
        $title = 'Editar Participante';
        return view('participante.gestionarParticipante', compact('participante', 'generos', 'title')); 
    }

    public function guardar(Request $request)
    {
          try {
            
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

  if( isset($validatedData['id'])) {
            $participante = Participante::find($validatedData['id']);
            if (!$participante) {
                return redirect()->back()->withErrors(['error' => 'Participante no encontrado.']);
            }
             $participante->update($validatedData);
        } else {
           Participante::create($validatedData);
        }
        return redirect()->route('participante.index')->with('success', 'Participante guardado exitosamente.');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Error al guardar el participante: ' . $th->getMessage()]);
    }
    }




    public function eliminar($id)  {

          try {
        

       $participante = Participante::find($id);
        if ($participante) {
            $participante->delete(); 
            
            return redirect()->route('participante.index')->with('success', 'Evento eliminado exitosamente!');
        } else {
            return redirect()->route('participante.index')->withErrors(['error' => 'Evento no encontrado.']);
        }


        } catch (\Throwable $th) {
            return redirect()->route('participante.index')->withErrors(['error' => 'Error al eliminar el participante: ' . $th->getMessage()]);
        }
        
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

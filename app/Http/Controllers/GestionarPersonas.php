<?php

namespace App\Http\Controllers;
use App\Models\Personas;
use App\Http\Controllers\Controller;
use App\Models\Genero; 
use Illuminate\Http\Request;

class GestionarPersonas extends Controller
{
  public function index()
{
    $personas = Personas::with('genero')->get(); 
  $personas = Personas::all();
   return view('personas.index', compact('personas'));
}

    public function gestionarPersonas()
    {
       $generos = Genero::all(); 
        $title = 'Agregar Personas';
      $personas = Personas::all(); 
        return view('personas.gestionarPersonas', compact('generos', 'title'));
    }

 public function editar($id)
    {
       
        $personas = Personas::find($id); // Obtener el participante a editar
        $generos = Genero::all(); // Obtener todos los géneros para el campo select
        $title = 'Editar Personas';
        return view('personas.gestionarPersonas', compact('personas', 'generos', 'title')); 
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
        ],
        [
            "cedula.required"=>"La cedula de la persona es requeridad",
            "primer_nombre.required"=>"El primer nombre de la persona es requeridad",
            "segundo_nombre.required"=>"El segundo nombre de la persona es requeridad",
            "primer_apellido.required"=>"El primer apellido de la persona es requeridad",
            "segundo_apellido.required"=>"El segundo apellido de la persona es requeridad",
            "fecha_nacimiento.required"=>"La fecha nacimiento de la persona es requeridad",
            "genero_id.required"=>"El genero de la persona es requeridad",

        ]);

  if( isset($validatedData['id'])) {
            $personas = Personas::find($validatedData['id']);
            if (!$personas) {
                return redirect()->back()->withErrors(['error' => 'Personas no encontrado.']);
            }
             $personas->update($validatedData);
        } else {
           Personas::create($validatedData);
        }
        return redirect()->route('personas.index')->with('success', 'Personas guardado exitosamente.');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Error al guardar el personas: ' . $th->getMessage()]);
    }
    }




    public function eliminar($id)  {

          try {
        

       $personas = Personas::find($id);
        if ($personas) {
            $personas->delete(); 
            
            return redirect()->route('personas.index')->with('success', 'Evento eliminado exitosamente!');
        } else {
            return redirect()->route('personas.index')->withErrors(['error' => 'Evento no encontrado.']);
        }


        } catch (\Throwable $th) {
            return redirect()->route('personas.index')->withErrors(['error' => 'Error al eliminar el personas: ' . $th->getMessage()]);
        }
        
    }


    public function obtenerPersonasPorCedula($cedula)
    {
        
        $personas = Personas::where('cedula', $cedula)->first();

        if ($personas) {
            return response()->json($personas);
        } else {
            return response()->json(['message' => 'Personas no encontrado'], 404);
        }
         
    }

}

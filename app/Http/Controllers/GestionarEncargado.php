<?php

namespace App\Http\Controllers;
use App\Models\Genero; 
use Illuminate\Http\Request;
use App\Models\Encargado; // <-- ¡Añade esta línea!
use App\Models\Evento;

class GestionarEncargado extends Controller
{
    public function index()
    {
     //   $encargado = Encargado::all();
         $encargados = Encargado::with('genero')->get(); 
        return view('encargado.index', compact('encargados'));
       // dd($encargados);
    }
    

    public function gestionarEncargado()
    {  $title = 'Agregar Encargado';
          $generos = Genero::all(); 
         $encargados = Encargado::all();
        return view('encargado.gestionarEncargado', compact( 'title', 'generos'));
    }


   public function guardar(Request $request)
    {
          try {
            
        $validatedData = $request->validate([
            'id' => 'nullable|uuid',
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'primer_apellido' => 'required|string|max:50',
            'segundo_apellido' => 'nullable|string|max:50',
            'cedula' => 'required|string|max:20',
            'correo' => 'required|string|max:50',
            'telefono' => 'required|string|max:20',
            'genero_id' => 'required|uuid|exists:genero,id'
        ]);

  if( isset($validatedData['id'])) {
            $encargados = encargado::find($validatedData['id']);
            if (!$encargados) {
                return redirect()->back()->withErrors(['error' => 'encargado no encontrado.']);
            }
             $encargados->update($validatedData);
        } else {
           encargado::create($validatedData);
        }
        return redirect()->route('encargado.index')->with('success', 'encargado guardado exitosamente.');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Error al guardar el encargado: ' . $th->getMessage()]);
    }
    }

     public function editar($id){
    $generos = Genero::all();
    $encargado = Encargado::find($id);
    $evento = Evento::all(); 
    $title = 'Editar Encargado';

    return view('encargado.gestionarEncargado', compact('encargado', 'evento', 'title', 'generos'));
}



     public function eliminar($id){
        try {
        

       $encargado = Encargado::find($id);
if ($encargado) {
    $encargado->delete();
    return redirect()->route('encargado.index')->with('success', 'Encargado eliminado exitosamente!');
} else {
    return redirect()->route('encargado.index')->withErrors(['error' => 'Encargado no encontrado.']);
}

        } catch (\Throwable $th) {
            dd($th);
        }
        
    }

}
<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Institucion;


class GestionarInstitucion extends Controller
{
     public function index()
    {

           $title = 'Agregar institucion';
            $instituciones = institucion::all(); 
     return view('institucion.index', compact( 'instituciones','title'));
    }

 public function gestionarInstitucion()
{
            $title = 'Agregar institucion';
            $instituciones = institucion::all(); 
       return view('institucion.gestionarinstitucion', compact('instituciones'));
}

public function editar($id)
{
        $instituciones = Institucion::find($id); 
        $title = 'Editar Instituciones';
        $instituciones = institucion::all(); 
        return view('institucion.gestionarinstitucion', compact('title')); 
}

 public function guardar(Request $request)
    {
          try {
            
        $validatedData = $request->validate([
            'id' => 'nullable|uuid',
            'nombre' => 'required|string|max:20',
            'responsable' => 'required|string|max:50',
            'direccion' => 'nullable|string|max:50',
            'telefono' => 'required|string|max:50',
            'correo' => 'nullable|string|max:50',
        ],
        [
            "nombre.required"=>"El nombre de la institucion es requeridad",
            "responsable.required"=>"El responsable de la institucion es requeridad",
            "direccion.required"=>"El direccion de la institucion es requeridad",
            "telefono.required"=>"El telefono de la institucion es requeridad",
            "correo.required"=>"El correo de la institucion es requeridad",


        ]);

  if( isset($validatedData['id'])) {
            $instituciones = institucion::find($validatedData['id']);
            if (!$instituciones) {
                return redirect()->back()->withErrors(['error' => 'Institucion no encontrado.']);
            }
             $instituciones->update($validatedData);
        } else {
           Institucion::create($validatedData);
        }
        return redirect()->route('institucion.index')->with('success', 'Institucion guardado exitosamente.');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Error al guardar el institucion: ' . $th->getMessage()]);
    }
    
    }


    public function eliminar($id)  {

          try {
        

       $instituciones = Institucion::find($id);
        if ($instituciones) {
            $instituciones->delete(); 
            
            return redirect()->route('institucion.index')->with('success', 'institucion eliminado exitosamente!');
        } else {
            return redirect()->route('institucion.index')->withErrors(['error' => 'institucion no encontrado.']);
        }


        } catch (\Throwable $th) {
            return redirect()->route('institucion.index')->withErrors(['error' => 'Error al eliminar el institucion: ' . $th->getMessage()]);
        }
        
    }


    
         
    

    
  
}
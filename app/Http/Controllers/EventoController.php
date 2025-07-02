<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Encargado;
use App\Models\Genero;
use App\Models\Asistencia;
use App\Models\TipoDeEvento;
use App\Models\Personas;
use App\Models\Institucion;

class EventoController extends Controller
{
    
    public function index(){
        // obetner la lista de eventos desde Bd usando postgresql laravel 
        $eventos = Evento::findAll();
        $instituciones = Institucion::all();
        
        return view('evento.evento', compact('eventos','instituciones'));
    }

    public function gestionarEvento(){
        $encargados = Encargado::all(); // Asegúrate de tener un modelo Encargado
        $instituciones = Institucion::all();
        $tiposDeEventos = TipoDeEvento::all(); // Asegúrate de tener un modelo TipoDeEvento
        $title = 'Agregar Evento';
        return view('evento.gestionarEvento', compact('encargados','instituciones', 'tiposDeEventos', 'title' ));
    }

    public function asistencia($id){
        
        $eventos = Evento::all();
        $generos  = Genero::all();

        return view('evento.gestionarAsistencia', compact('eventos' , 'generos', 'id'));
    }

    public function editar($id){
        
        $evento = Evento::find($id);
        $instituciones = Institucion::all();    
        $encargados = Encargado::all();
        $tiposDeEventos = TipoDeEvento::all();
        $title = 'Editar Evento';

        return view('evento.gestionarEvento', compact('evento', 'encargados', 'tiposDeEventos', 'instituciones', 'title'));
    }

    public function guardar(Request $request){

        try {
            $validatedData = $request->validate([
                'id' => 'nullable|uuid',
                'nombre' => 'required|string|max:255', // Campo de texto para el nombre
                'direccion' => 'required|string|max:255', // Campo de texto para la dirección
                'fecha_inicio' => 'required|date', // Campo de fecha (asegúrate que el formato sea correcto)
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio', // Campo de fecha, debe ser igual o posterior a fecha_inicio
                'encargado_id' => 'required|uuid|exists:encargado,id', // Dropdown, asumo que es la FK a la tabla 'encargados'
                'tipo_de_evento_id' => 'required|uuid|exists:tipo_de_evento,id', // Dropdown, asumo que es la FK a la tabla 'encargados'
                'institucion_id' => 'required|uuid|exists:institucion,id',
            ],
            [
                "nombre.required"=>"El nombre del evento es requeridad",
                "direccion.required"=>"La direccion del evento es requeridad",
                "fecha_inicio.required"=>"Fecha de inicio del evento es requeridad",
                    "fecha_fin.required"=>"Fecha de final del evento es requeridad",
                    "encargado_id.required"=>"El encargado del evento es requerido",
                    "tipo_de_evento_id.required"=>"El tipo del evento es requerido",
                    "institucion_id.required"=>"La institucion del evento es requerido",
                    
                
                
            ]);
            
    
    
            if( isset($validatedData['id'])) {
                // Si el ID está presente, actualiza el evento
                $evento = Evento::find($validatedData['id']);
                if (!$evento) {
                    return redirect()->back()->withErrors(['error' => 'Evento no encontrado.']);
                }
                $evento->update($validatedData);
            } else {
                // Si el ID no está presente, crea un nuevo evento
                Evento::create($validatedData);
            }
            
            return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente!');
        } catch (\Throwable $th) {
            dd($th);
        }
        
        
    }

    public function guardarAsistencia(Request $request){
        // Validar los datos del formulario
        try {
            $validatedData = $request->validate([
            'evento_id' => 'required|uuid|exists:evento,id',
            'cedula' => 'required|string|max:20', // Asegúrate de que el formato de la cédula sea correcto
            'primer_nombre' => 'required|string|max:50',
            'segundo_nombre' => 'nullable|string|max:50',
            'primer_apellido' => 'required|string|max:50',
            'segundo_apellido' => 'nullable|string|max:50',
            'genero_id' => 'required|uuid|exists:genero,id',
            'fecha_nacimiento' => 'required|date', // Asegúrate de que el formato de la fecha sea correcto
            'asistencia' => 'required|string', // O el tipo de dato que desees para la asistencia
        ]);

        // Guardar la asistencia en la base de datos
        Asistencia::create([
            'evento_id' => $validatedData['evento_id'],
            'personas_id' => Personas::create([
                'cedula' => $validatedData['cedula'],
                'primer_nombre' => $validatedData['primer_nombre'],
                'segundo_nombre' => $validatedData['segundo_nombre'],
                'primer_apellido' => $validatedData['primer_apellido'],
                'segundo_apellido' => $validatedData['segundo_apellido'],
                'genero_id' => $validatedData['genero_id'],
                'fecha_nacimiento' => $validatedData['fecha_nacimiento']
            ])->id,
            'asistencia' => $validatedData['asistencia'], // O el valor que desees asignar
            ] );

        return redirect()->route('eventos.index')->with('success', 'Asistencia registrada exitosamente!');

        } catch (\Throwable $th) {
           dd($th);
        }
       
    }

    public function eliminar($id){
        try {
        

        $evento = Evento::find($id);
        if ($evento) {
            $evento->delete(); 
            
            return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente!');
        } else {
            return redirect()->route('eventos.index')->withErrors(['error' => 'Evento no encontrado.']);
        }


        } catch (\Throwable $th) {
            dd($th);
        }
        
    }

    public function listadoDeAsistencia($id){
        // Obtener el evento por su ID
        $evento = Evento::find($id);
        
        if (!$evento) {
            return redirect()->route('eventos.index')->withErrors(['error' => 'Evento no encontrado.']);
        }

        // Obtener las asistencias del evento
        $asistencias = Asistencia::where('evento_id', $id)->get();
        //dd($asistencias[0]->participante);
        return view('evento.listadoDeAsistencia', compact('evento', 'asistencias'));
    }
    
}
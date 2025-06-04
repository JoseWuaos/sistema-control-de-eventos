<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encargado; // <-- ¡Añade esta línea!

class GestionarEncargado extends Controller
{
    public function index()
    {
        $encargados = Encargado::all();
        return view('encargado.index', compact('encargados'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gestionarAsistencia extends Controller
{
    public function gestionarAsistencia()
    {
        return view('evento.gestionarAsistencia');
    }

}

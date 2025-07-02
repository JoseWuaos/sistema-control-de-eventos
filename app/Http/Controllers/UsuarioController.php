<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Evento;

class UsuarioController extends Controller
{
    public function login(Request $request)
{
    if ($request->isMethod('post')) {

        // Validación de campos requeridos
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Obtener credenciales
        $credentials = $request->only('username', 'password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            return redirect()->route('eventos.index')->withSuccess('Logado correctamente.');
        }

        // Si falla, redirigir con mensaje de error
        return redirect()->route('usuario.login')->withErrors(['msg' => 'Datos incorrectos']);
    }

    return view('usuario.login');
	
}
public function logout(Request $request)
{
    Auth::logout(); // Cierra la sesión del usuario

    $request->session()->invalidate(); // Invalida la sesión actual
    $request->session()->regenerateToken(); // Regenera el token CSRF

    return redirect('/login'); // Redirige al inicio de sesión o página principal
}
    
}

<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    // Inicio de sesión del usuario
    public function login(Request $request)
    {
        // JWTAuth and attempt
        $token = JWTAuth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!empty($token)) {
            // Respuesta
            return response()->json([
                'status' => true,
                'message' => 'Inicio sesión exitoso',
                'token' => $token,
                'usuario' => auth()->user(),
            ]);
        }

        return response()->json([
            'status' => false,
            'error' => 'Inicio de sesión fallido'
        ], 401);
    }


    // Cierre de sesión del usuario
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => true,
            'message' => 'Cierre de sesión exitoso'
        ]);
    }

    public function profile()
    {
        $usuario = auth()->user();
        $empleado = $usuario->empleado;

        return response()->json([
            'status' => true,
            'message' => 'Datos del perfil del usuario',
            'usuario' => $usuario
        ]);
    }

    // Para generar el valor del token actualizado
    public function refreshToken()
    {
        $newToken = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "Nuevo token de acceso generado",
            "token" => $newToken
        ]);
    }
}

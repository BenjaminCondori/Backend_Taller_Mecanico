<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        // $usuarios = Usuario::all();
        $usuarios = Usuario::has('empleado')->with('empleado', 'rol')->get();
        return response()->json($usuarios);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $usuario = Usuario::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Usuario creado satisfactoriamente',
            'usuario' => $usuario
        ], 201);
    }


    public function show(string $id)
    {
        // $usuario = Usuario::find($id);
        $usuario = Usuario::has('empleado')->with('empleado', 'rol')->find($id);

        if (!$usuario) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el usuario
            '], 404);
        }

        return response()->json($usuario);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el usuario'
            ], 404);
        }

        $usuario->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Usuario actualizado satisfactoriamente',
            'usuario' => $usuario
        ], 200);
    }


    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el usuario'
            ], 404);
        }

        $usuario->delete();

        return response()->json([
            'status' => true,
            'message' => 'Usuario eliminado satisfactoriamente',
            'usuario' => $usuario,
        ], 200);
    }
}

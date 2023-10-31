<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::all();
        return response()->json($permisos);
    }


    public function create()
    {
        //
    }


    public function asignarPermiso(Request $request)
    {
        $rol = Rol::find($request->rol_id);
        $permiso = Permiso::find($request->permiso_id);

        if (!$rol || !$permiso) {
            // Maneja el caso en el que el rol o el permiso no existen
            return response()->json(['error' => 'Rol o permiso no encontrado'], 404);
        }

        // Asigna el permiso al rol
        $rol->permisos()->attach($permiso->id);

        // Puedes devolver una respuesta de éxito
        return response()->json(['message' => 'Permiso asignado correctamente'], 200);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}

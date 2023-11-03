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
            return response()->json(['error' => 'Rol o permiso no encontrado'], 404);
        }

        // Asigna el permiso al rol
        $rol->permisos()->attach($permiso->id);
        return response()->json(['message' => 'Permiso asignado correctamente'], 200);
    }


    public function desasignarPermiso(Request $request)
    {
        $rol = Rol::find($request->rol_id);
        $permiso = Permiso::find($request->permiso_id);

        if (!$rol || !$permiso) {
            return response()->json(['error' => 'Rol o permiso no encontrado'], 404);
        }

        // Desasigna el permiso del rol utilizando detach en lugar de attach
        $rol->permisos()->detach($permiso->id);
        return response()->json(['message' => 'Permiso desasignado correctamente'], 200);
    }


    public function obtenerPermisos($rol_id)
    {
        $rol = Rol::find($rol_id);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        // Obtiene los permisos del rol
        $permisos = $rol->permisos;
        return response()->json($permisos);
    }

    public function asignarTodosLosPermisos($rol_id)
    {
        $rol = Rol::find($rol_id);
        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        // Obtén todos los permisos disponibles
        $permisos = Permiso::all();
        // $permisos = Permiso::pluck('id')->toArray();

        // Asigna todos los permisos al rol
        $rol->permisos()->sync($permisos);

        return response()->json([
            'message' => 'Se han asignado todos los permisos al rol correctamente.',
        ]);
    }


    public function desasignarTodosLosPermisos($rol_id)
    {
        $rol = Rol::find($rol_id);
        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        // Desasigna todos los permisos del rol
        $rol->permisos()->detach();

        return response()->json([
            'message' => 'Se han desasignado todos los permisos del rol correctamente.',
        ]);
    }


    public function tienePermiso($rolId, $permiso)
    {
        $rol = Rol::find($rolId);

        if (!$rol) {
            return response()->json(['error' => 'Rol no encontrado'], 404);
        }

        $tienePermiso = $rol->permisos->contains('nombre', $permiso);

        return response()->json(['tienePermiso' => $tienePermiso]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Rol::all();
        $roles = Rol::where('nombre', '!=', 'Cliente')->get();
        // $roles = Rol::whereNotIn('nombre', ['Cliente'])->get();
        return response()->json($roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Rol creado satisfactoriamente',
            'rol' => $rol
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'status' => false,
                'message' => 'Rol no encontrado'
            ], 404);
        }

        return response()->json($rol);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontró el rol'
            ], 404);
        }

        $rol->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Rol actualizado satisfactoriamente',
            'rol' => $rol
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'status' => false,
                'message' => 'No se encontró el rol'
            ], 404);
        }

        $rol->delete();

        return response()->json([
            'status' => true,
            'message' => 'Rol eliminado satisfactoriamente',
            'rol' => $rol
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // $categorias = Categoria::all();
        $categorias = Categoria::whereNotIn('nombre', ['Servicios', 'Productos'])
            ->with('categoriaPadre')
            ->get();
        return response()->json($categorias);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());

        // bitacora
        // $descripcion = 'Se creó una nueva categoria con ID: '.$categoria->id;
        //registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Categoria creada satisfactoriamente',
            'categoria' => $categoria
        ], 201);
    }


    public function show(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la categoria',
            ], 404);
        }

        return response()->json($categoria);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la categoria',
            ], 404);
        }

        $categoria->nombre = $request->nombre;
        if($request->has('categoria_id')){
            $categoria->categoria_id = $request->categoria_id;
        }
        $categoria->save();

        // bitacora
        $descripcion = 'Se actualizo una categoria con ID: '.$categoria->id;
       // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Categoria actualizada satisfactoriamente',
            'categoria' => $categoria
        ], 200);
    }


    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró la categoria',
            ], 404);
        }

        if (!$categoria->productos->isEmpty() || !$categoria->servicios->isEmpty()) {
            return response()->json([
                'status' => false,
                'error' => 'No se puede eliminar la categoria porque tiene productos o servicios asociados',
            ], 500);
        }

        $categoria->delete();

        $descripcion = 'Se elimino una categoria con ID: '.$categoria->id;
        //registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Categoria eliminada satisfactoriamente',
            'categoria' => $categoria
        ], 200);
    }
}

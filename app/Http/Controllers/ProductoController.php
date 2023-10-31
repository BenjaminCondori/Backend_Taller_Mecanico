<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function index()
    {
        // $productos = Producto::all();
        $productos = Producto::with('proveedor', 'categoria')->get();
        return response()->json($productos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {


        $producto = Producto::create($request->all());


        return response()->json([
            'status' => true,
            'message' => 'Producto creado satisfactoriamente',
            'producto' => $producto,
        ], 201);
    }


    public function show(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el producto',
            ], 404);
        }

        // $imagenPath = public_path("/image") . '/' . $producto->imagen;

        return response()->json($producto);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el producto',
            ], 404);
        }

        $producto->update($request->all());

        // bitacora
        // $descripcion = 'Se actualizo un producto con ID: '.$producto->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Producto actualizado satisfactoriamente',
            'producto' => $producto
        ]);
    }


    public function destroy(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el producto',
            ], 404);
        }

        $producto->delete();

        // bitacora
        // $descripcion = 'Se elimino el producto con ID: '.$producto->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Producto eliminado satisfactoriamente',
            'producto' => $producto
        ]);
    }
}

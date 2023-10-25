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
        $productos = Producto::with('inventario', 'proveedor', 'categoria')->get();
        return response()->json($productos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $image_name = Str::slug($image_name).".".$file->guessExtension();
            $file->move(public_path("/image"), $image_name);
        }

        $inventario = Inventario::create([
            'stock_disponible' => $request->stock_disponible,
            'stock_minimo' => $request->stock_minimo,
        ]);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio_venta' => $request->precio_venta,
            'precio_compra' => $request->precio_compra,
            'categoria_id' => $request->categoria_id,
            'proveedor_id' => $request->proveedor_id,
            'inventario_id' => $inventario->id,
            'imagen' => $image_name,
        ]);

        // bitacora
        // $descripcion = 'Se creó un nuevo producto con ID: '.$producto->id;
        // registrarBitacora($descripcion);

        return response()->json([
            'status' => true,
            'message' => 'Producto creado satisfactoriamente',
            'producto' => $producto,
            'inventario' => $inventario,
        ], 201);
    }


    public function show(string $id)
    {
        // $producto = Producto::find($id);
        $producto = Producto::with('inventario')->find($id);

        if (!$producto) {
            return response()->json([
                'status' => false,
                'error' => 'No se encontró el producto',
            ], 404);
        }

        $imagenPath = public_path("/image") . '/' . $producto->imagen; // Construye la URL completa de la imagen

        return response()->json([
            'status' => true,
            'producto' => $producto,
            'imagen_url' => $imagenPath, // Devuelve la URL completa de la imagen
        ], 200);

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

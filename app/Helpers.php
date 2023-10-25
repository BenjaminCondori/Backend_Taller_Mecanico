<?php


use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

function registrarBitacora($descripcion) {

    // $usuario = Auth::user();
    // dd($usuario);
    Bitacora::create([
        'id_usuario' => 1,
        'descripcion' => $descripcion,
    ]);

    // $roles = ['Mecanico', 'Cliente'];

    // if ($usuario && !in_array($usuario->rol->nombre, $roles) {
    //     Bitacora::create([
    //         'id_usuario' => $usuario->empleado->id,
    //         'descripcion' => $descripcion,
    //     ]);
    // }

}

function precioTotalCotizacion(Request $request){

    $sumaTotal = 0.0;

    $productos = $request->productos;
    foreach($productos as $item)
        $sumaTotal = $sumaTotal + ((decimal)[$item['producto_cantidad']]*(decimal) [$item['precio']]);

    $servicios = $request->servicios;
    foreach($servicios as $item)
        $sumaTotal =$sumaTotal + ((decimal) [$item['servicio_cantidad']]* (decimal) [$item['precio']]);

    return $sumaTotal;
}

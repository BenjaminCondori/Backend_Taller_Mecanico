<?php


use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Empleado;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

function registrarBitacora(Request $request, string $descripcion) {

    $usuario = Auth::user();

    $nombre_usuario = nombreUsuario($usuario->id);

    // optenemos la ip de usuario
    $ip = $request->ip();
    // vemos si la ip es real y no esta usando un proxy
    if (getenv('HTTP_CLIENT_IP')){
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR')){
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('HTTP_X_FORWARDED')){
        $ip = getenv('HTTP_X_FORWARDED');
    } elseif (getenv('HTTP_FORWARDED_FOR')){
        $ip = getenv('HTTP_FORWARDED_FOR');
    }elseif (getenv('HTTP_FORWARDED')){
        $ip = getenv('HTTP_FORWARDED');
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    Bitacora::create([
        'id_usuario' => $usuario->id,
        // 'usuario' => $nombre_usuario,
        'fecha' => date('Y-m-d H:i:s'),
        'ip_usuario' => (string) [$ip],
        'descripcion' => $descripcion,
    ]);

}

function nombreUsuario($id){
    $cliente = CLiente::where('usuario_id', $id)->first();
    if ($cliente){ // verificamos si existe el cliente
        return $cliente->nombre .' ' .$cliente->apeliido;
    }

    $empleado = Empleado::where('usuario_id', $id)->first();
    if ($empleado){ // verificamos si exite el empleado
        return $empleado->nombre .' ' .$empleado->apeliido;
    }
    return 'no se encontro el usuario';
}

function precioTotalCotizacion(Request $request){

    $sumaTotal = 0.0;

    $productos = $request->productos;
    foreach($productos as $item)
        $sumaTotal = $sumaTotal + ((float)[$item['producto_cantidad']]*(float) [$item['precio']]);

    $servicios = $request->servicios;
    foreach($servicios as $item)
        $sumaTotal =$sumaTotal + ((float) [$item['servicio_cantidad']]* (float) [$item['precio']]);

    return $sumaTotal;
}

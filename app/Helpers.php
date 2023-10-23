<?php


use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;

function registrarBitacora($descripcion) {

    // $usuario = Auth::user();
    // dd($usuario);
    Bitacora::create([
        'id_usuario' => 1,
        'descripcion' => $descripcion,
    ]);
    // $usuario = Auth::user();

    // $roles = ['Administrador', 'Recepcionista', 'Mecanico', 'Cliente'];

    // if ($usuario) {
    //     Bitacora::create([
    //         'id_usuario' => $usuario->empleado->id,
    //         'descripcion' => $descripcion,
    //     ]);
    // }

}

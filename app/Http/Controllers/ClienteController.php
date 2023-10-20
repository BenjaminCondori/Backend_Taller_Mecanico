<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // Comprueba si se proporciona un campo 'password' en la solicitud
        if ($request->has('password')) {
            $password = Hash::make($request->password);
        } else {
            // Si no se proporciona un campo 'password', usa el campo 'ci' como contraseña
            $password = Hash::make($request->ci);
        }

        // Crea el usuario con la contraseña determinada
        $usuario = Usuario::create([
            'email' => $request->email,
            'password' => $password,
            'rol_id' => Rol::where('nombre', 'Cliente')->pluck('id')->first(),
        ]);

        // Verificar que el usuario se haya creado correctamente
        if (!$usuario) {
            return response()->json(['error' => 'Error al crear al usuario'], 404);
        }

        // Crear un nuevo cliente relacionado con el usuario
        $cliente = new Cliente([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
        ]);

        // Asociar el cliente con el usuario
        $usuario->cliente()->save($cliente);

        return response()->json([
            'status' => true,
            'message' => 'Cliente creado satisfactoriamente',
            'cliente' => $cliente,
            'usuario' => $usuario
        ], 201);
    }


    public function show(string $id)
    {
        // Encuentra el cliente por su ID con su usuario asociado
        $cliente = Cliente::with('usuario')->find($id);

        if (!$cliente) {
            // Si no se encuentra el cliente, devuelve una respuesta de error
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        // Devuelve el cliente en formato JSON
        return response()->json($cliente);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        // Encuentra el cliente por su CI
        $cliente = Cliente::find($request->id);

        if (!$cliente) {
            // Si no se encuentra el cliente, devuelve una respuesta de error
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        // Actualiza los datos del cliente con los valores del formulario
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();

        // Actualiza el correo electrónico del usuario asociado (si ha cambiado)
        if ($cliente->usuario->email !== $request->email) {
            $cliente->usuario->email = $request->email;
            $cliente->usuario->save();
        }

        // Devuelve una respuesta exitosa
        $data = [
            'status' => 'true',
            'message' => 'Cliente actualizado satisfactoriamente',
            'Cliente' => $cliente
        ];
        return response()->json($data);
    }


    public function destroy(string $id)
    {
         // Encuentra el cliente por su ID
         $cliente = Cliente::find($id);

         if (!$cliente) {
             // Si no se encuentra el cliente, devuelve una respuesta de error
             return response()->json(['error' => 'Cliente no encontrado'], 404);
         }

         // Elimina el cliente
         $cliente->delete();

         // Encuentra el usuario asociado al cliente
         $usuario = $cliente->usuario;

         if ($usuario) {
             // Elimina el usuario
             $usuario->delete();
         }

         // Devuelve una respuesta exitosa
         $data = [
             'status' => true,
             'message' => 'Cliente eliminado satisfactoriamente',
             'Cliente' => $cliente
         ];
         return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('usuario.rol')->get();
        return response()->json($empleados);
    }


    public function create()
    {
       //
    }


    public function store(Request $request)
    {
         // Crea el usuario con la contraseña determinada
         $usuario = Usuario::create([
            'email' => $request->email,
            'password' => Hash::make($request->ci),
            'rol_id' => $request->rol_id,
        ]);

        // Verificar que el usuario se haya creado correctamente
        if (!$usuario) {
            return response()->json([
                'status' => false,
                'error' => 'Error al crear al usuario'
            ], 404);
        }

        // Crear un nuevo cliente relacionado con el usuario
        $empleado = new Empleado([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'puesto_id' => $request->puesto_id,
        ]);

        // Asociar el cliente con el usuario
        $usuario->empleado()->save($empleado);

        return response()->json([
            'status' => true,
            'message' => 'Empleado creado satisfactoriamente',
            'empleado' => $empleado,
            'usuario' => $usuario
        ], 201);
    }


    public function show(string $id)
    {
        // Encuentra el empleado por su ID con su usuario asociado
        $empleado = Empleado::with('usuario')->find($id);

        if (!$empleado) {
            // Si no se encuentra el empleado, devuelve una respuesta de error
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        // Devuelve el empleado en formato JSON
        return response()->json($empleado);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        // Encuentra el empleado por su ID
        $empleado = Empleado::find($request->id);

        if (!$empleado) {
            // Si no se encuentra el empleado, devuelve una respuesta de error
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        // Actualiza los datos del empleado con los valores del formulario
        $empleado->ci = $request->ci;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->genero = $request->genero;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->puesto_id = $request->puesto_id;
        $empleado->save();

        // Actualiza el correo electrónico del usuario asociado (si ha cambiado)
        $empleado->usuario->email = $request->email;
        $empleado->usuario->rol_id = $request->rol_id;
        $empleado->usuario->save();

        // Devuelve una respuesta exitosa
        $data = [
            'status' => 'true',
            'message' => 'Empleado actualizado satisfactoriamente',
            'empleado' => $empleado
        ];
        return response()->json($data);
    }


    public function destroy(string $id)
    {
        // Encuentra el empleado por su ID
        $empleado = Empleado::find($id);

        if (!$empleado) {
            // Si no se encuentra el empleado, devuelve una respuesta de error
            return response()->json(['error' => 'Empleado no encontrado'], 404);
        }

        // Elimina el empleado
        $empleado->delete();

        // Encuentra el usuario asociado al empleado
        $usuario = $empleado->usuario;

        if ($usuario) {
            // Elimina el usuario
            $usuario->delete();
        }

        // Devuelve una respuesta exitosa
        $data = [
            'status' => true,
            'message' => 'Empleado eliminado satisfactoriamente',
            'empleado' => $empleado
        ];
        return response()->json($data);
    }
}

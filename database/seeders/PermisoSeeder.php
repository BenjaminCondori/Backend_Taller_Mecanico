<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permiso::create([
            'nombre' => 'Ver_Productos',
            'descripcion' => 'Este permiso permite a los usuarios con el rol correspondiente ver los productos disponibles en la tienda en línea. Los usuarios pueden explorar los productos, ver detalles y precios.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Productos',
            'descripcion' => 'Este permiso autoriza a los usuarios a agregar nuevos productos a la tienda en línea. Pueden proporcionar detalles de productos, imágenes y configurar opciones de venta.',
        ]);

        Permiso::create([
            'nombre' => 'Editar_Productos',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre productos, como cambiar descripciones, precios, imágenes y otras especificaciones.',
        ]);


        Permiso::create([
            'nombre' => 'Eliminar_Productos',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar productos del inventario. Esto puede ser útil para gestionar productos que ya no se ofrecen.',
        ]);

        Permiso::create([
            'nombre' => 'Ver_Categorías',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de categorías disponibles en la tienda en línea. Pueden explorar las categorías y sus respectivos productos.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Categorías',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevas categorías a la tienda en línea. Pueden especificar el nombre, descripción y otras configuraciones para la categoría.',
        ]);

        Permiso::create([
            'nombre' => 'Editar_Categorías',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre categorías existentes. Pueden cambiar nombres, descripciones y otros detalles de la categoría.',
        ]);

        Permiso::create([
            'nombre' => 'Eliminar_Categorías',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar categorías del sistema. Esto implica la eliminación de la categoría y la reorganización de los productos relacionados.',
        ]);

        Permiso::create([
            'nombre' => 'Ver_Usuarios',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de usuarios registrados en el sistema. Pueden explorar los perfiles de otros usuarios sin realizar cambios.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Usuarios',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos usuarios al sistema. Esto es útil para la creación de cuentas de otros empleados o miembros del equipo.',
        ]);

        Permiso::create([
            'nombre' => 'Editar_Usuarios',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre otros usuarios. Pueden actualizar datos como nombres, direcciones de correo electrónico, contraseñas, roles, etc.',
        ]);

        Permiso::create([
            'nombre' => 'Eliminar_Usuarios',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar cuentas de otros usuarios del sistema. Esto implica la eliminación permanente de una cuenta de usuario.',
        ]);

        Permiso::create([
            'nombre' => 'Ver_Clientes',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de clientes registrados en la tienda en línea. Pueden explorar los perfiles de clientes sin realizar cambios.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Clientes',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos clientes al sistema. Esto es útil para la creación de cuentas de clientes y la gestión de la base de datos de clientes.',
        ]);

        Permiso::create([
            'nombre' => 'Editar_Clientes',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre clientes existentes. Pueden actualizar datos como nombres, direcciones de correo electrónico, detalles de contacto y preferencias.',
        ]);

        Permiso::create([
            'nombre' => 'Eliminar_Clientes',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar cuentas de clientes del sistema. Esto implica la eliminación permanente de una cuenta de cliente.',
        ]);
    }
}

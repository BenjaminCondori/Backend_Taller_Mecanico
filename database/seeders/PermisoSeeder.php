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
            'nombre' => 'Lista_Usuarios',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de usuarios registrados en el sistema. Pueden explorar los perfiles de otros usuarios sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Usuarios',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de usuarios registrados en el sistema. Pueden explorar los perfiles de otros usuarios sin realizar cambios.',
        ]);

        // Permiso::create([
        //     'nombre' => 'Agregar_Usuarios',
        //     'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos usuarios al sistema. Esto es útil para la creación de cuentas de otros empleados o miembros del equipo.',
        // ]);

        Permiso::create([
            'nombre' => 'Editar_Usuarios',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre otros usuarios. Pueden actualizar datos como nombres, direcciones de correo electrónico, contraseñas, roles, etc.',
        ]);

        Permiso::create([
            'nombre' => 'Eliminar_Usuarios',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar cuentas de otros usuarios del sistema. Esto implica la eliminación permanente de una cuenta de usuario.',
        ]);
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Roles',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de roles disponibles en el sistema. Pueden explorar los roles y sus respectivos permisos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Roles',
            'descripcion' => 'Este permiso permite a los usuarios ver la información a detalle de los roles existentes. Los usuarios pueden explorar los roles y sus respectivos permisos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Roles',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos roles al sistema. Pueden especificar el nombre, descripción y permisos para el rol.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Roles',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre roles existentes. Pueden cambiar nombres, descripciones y permisos para el rol.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Roles',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar roles del sistema. Esto implica la eliminación del rol y la reorganización de los usuarios relacionados.',
        ]);

        Permiso::create([
            'nombre' => 'Lista_Permisos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de permisos disponibles en el sistema.',
        ]);
        
        Permiso::create([
            'nombre' => 'Asignar_Permisos',
            'descripcion' => 'Este permiso permite a los usuarios asignar o desasignar permisos a los roles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Lista_Clientes',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de clientes registrados. Pueden explorar los perfiles de clientes sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Clientes',
            'descripcion' => 'Este permiso permite a los usuarios ver la información de los clientes registrados. Pueden explorar los perfiles de clientes sin realizar cambios.',
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
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Empleados',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de empleados registrados. Pueden explorar los perfiles de empleados sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Empleados',
            'descripcion' => 'Este permiso permite a los usuarios ver la información de los empleados registrados. Pueden explorar los perfiles de empleados sin realizar cambios.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Empleados',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos empleados al sistema. Esto es útil para la creación de cuentas de empleados y la gestión de la base de datos de empleados.',
        ]);

        Permiso::create([
            'nombre' => 'Editar_Empleados',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre empleados existentes. Pueden actualizar datos como nombres, direcciones de correo electrónico, detalles de contacto y preferencias.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Empleados',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar cuentas de empleados del sistema. Esto implica la eliminación permanente de una cuenta de empleado.',
        ]);
        
        Permiso::create([
            'nombre' => 'Lista_Puestos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de puestos registrados. Pueden explorar los perfiles de puestos sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Puestos',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos puestos al sistema. Esto es útil para la creación de puestos y la gestión de la base de datos de puestos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Puestos',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre puestos existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Puestos',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar puestos del sistema. Esto implica la eliminación permanente de un puesto.',
        ]);
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Marcas',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de marcas registradas. Pueden explorar los perfiles de marcas sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Marcas',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevas marcas al sistema. Esto es útil para la creación de marcas y la gestión de la base de datos de marcas.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Marcas',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre marcas existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Marcas',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar marcas del sistema. Esto implica la eliminación permanente de una marca.',
        ]);
        
        Permiso::create([
            'nombre' => 'Lista_Modelos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de modelos registrados. Pueden explorar los perfiles de modelos sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Modelos',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos modelos al sistema. Esto es útil para la creación de modelos y la gestión de la base de datos de modelos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Modelos',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre modelos existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Modelos',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar modelos del sistema. Esto implica la eliminación permanente de un modelo.',
        ]);
        
        Permiso::create([
            'nombre' => 'Lista_TiposVehiculos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de tipos de vehículos registrados. Pueden explorar los perfiles de tipos de vehículos sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_TiposVehiculos',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos tipos de vehículos al sistema. Esto es útil para la creación de tipos de vehículos y la gestión de la base de datos de tipos de vehículos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_TiposVehiculos',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre tipos de vehículos existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_TiposVehiculos',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar tipos de vehículos del sistema. Esto implica la eliminación permanente de un tipo de vehículo.',
        ]);
        
        Permiso::create([
            'nombre' => 'Lista_Vehiculos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de vehículos registrados. Pueden explorar los perfiles de vehículos sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Vehiculos',
            'descripcion' => 'Este permiso permite a los usuarios ver la información de los vehículos registrados. Pueden explorar los perfiles de vehículos sin realizar cambios.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Vehiculos',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos vehículos al sistema. Esto es útil para la creación de vehículos y la gestión de la base de datos de vehículos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Vehiculos',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre vehículos existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Vehiculos',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar vehículos del sistema. Esto implica la eliminación permanente de un vehículo.',
        ]);
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Productos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de productos disponibles en la tienda en línea. Pueden explorar los productos, ver detalles y precios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Productos',
            'descripcion' => 'Este permiso permite a los usuarios ver la información a detalle de los productos existentes. Los usuarios pueden explorar los productos, ver detalles y precios.',
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
            'nombre' => 'Lista_Servicios',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de servicios disponibles en la tienda en línea. Pueden explorar los servicios, ver detalles y precios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Servicios',
            'descripcion' => 'Este permiso autoriza a los usuarios a agregar nuevos servicios a la tienda en línea. Pueden proporcionar detalles de servicios, imágenes y configurar opciones de venta.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Servicios',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre servicios, como cambiar descripciones, precios, imágenes y otras especificaciones.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Servicios',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar servicios del inventario. Esto puede ser útil para gestionar servicios que ya no se ofrecen.',
        ]);
        
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Categorias',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de categorías disponibles en la tienda en línea. Pueden explorar las categorías y sus respectivos productos.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Categorias',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevas categorías a la tienda en línea. Pueden especificar el nombre, descripción y otras configuraciones para la categoría.',
        ]);

        Permiso::create([
            'nombre' => 'Editar_Categorias',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre categorías existentes. Pueden cambiar nombres, descripciones y otros detalles de la categoría.',
        ]);

        Permiso::create([
            'nombre' => 'Eliminar_Categorias',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar categorías del sistema. Esto implica la eliminación de la categoría y la reorganización de los productos relacionados.',
        ]);

        
        
        
        Permiso::create([
            'nombre' => 'Lista_Proveedores',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de proveedores registrados. Pueden explorar los perfiles de proveedores sin realizar cambios.',
        ]);

        Permiso::create([
            'nombre' => 'Agregar_Proveedores',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos proveedores al sistema. Esto es útil para la creación de cuentas de proveedores y la gestión de la base de datos de proveedores.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Proveedores',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre proveedores existentes. Pueden actualizar datos como nombres, direcciones de correo electrónico, detalles de contacto y preferencias.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Proveedores',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar cuentas de proveedores del sistema. Esto implica la eliminación permanente de una cuenta de proveedor.',
        ]);
        
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Diagnosticos',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de diagnósticos registrados. Pueden explorar los perfiles de diagnósticos sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Diagnosticos',
            'descripcion' => 'Este permiso permite a los usuarios ver la información de los diagnósticos registrados. Pueden explorar los perfiles de diagnósticos sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Diagnosticos',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevos diagnósticos al sistema. Esto es útil para la creación de diagnósticos y la gestión de la base de datos de diagnósticos.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Diagnosticos',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre diagnósticos existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Diagnosticos',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar diagnósticos del sistema. Esto implica la eliminación permanente de un diagnóstico.',
        ]);
        
        
        
        
        Permiso::create([
            'nombre' => 'Lista_Cotizaciones',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de cotizaciones registradas. Pueden explorar los perfiles de cotizaciones sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Ver_Cotizaciones',
            'descripcion' => 'Este permiso permite a los usuarios ver la información de las cotizaciones registradas. Pueden explorar los perfiles de cotizaciones sin realizar cambios.',
        ]);
        
        Permiso::create([
            'nombre' => 'Agregar_Cotizaciones',
            'descripcion' => 'Con este permiso, los usuarios pueden agregar nuevas cotizaciones al sistema. Esto es útil para la creación de cotizaciones y la gestión de la base de datos de cotizaciones.',
        ]);
        
        Permiso::create([
            'nombre' => 'Editar_Cotizaciones',
            'descripcion' => 'Este permiso otorga a los usuarios la capacidad de editar información sobre cotizaciones existentes. Pueden actualizar datos como nombres, descripciones y otros detalles.',
        ]);
        
        Permiso::create([
            'nombre' => 'Eliminar_Cotizaciones',
            'descripcion' => 'Con este permiso, los usuarios pueden eliminar cotizaciones del sistema. Esto implica la eliminación permanente de una cotización.',
        ]);
        

        
        
        Permiso::create([
            'nombre' => 'Lista_Bitacoras',
            'descripcion' => 'Este permiso permite a los usuarios ver la lista de bitácoras registradas. Pueden explorar los perfiles de bitácoras sin realizar cambios.',
        ]);
        
    }
}

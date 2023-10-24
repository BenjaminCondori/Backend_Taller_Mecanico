<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Producto::create([
            'nombre' => 'Motores',
            'descripcion' => 'Reparación y mantenimiento de motores de vehículos.',
            'categoria_id' => 3,
            'precio' => 250.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'motor.jpg',
            'proveedor_id' => 1,
            'inventario_id' => 1,
        ]);

        Producto::create([
            'nombre' => 'Transmisión',
            'descripcion' => 'Reparación y ajuste de la transmisión del vehículo.',
            'categoria_id' => 3,
            'precio' => 200.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'transmision.jpg',
            'proveedor_id' => 1,
            'inventario_id' => 2,
        ]);

        Producto::create([
            'nombre' => 'Frenos',
            'descripcion' => 'Reparación y sustitución de componentes del sistema de frenos.',
            'categoria_id' => 3,
            'precio' => 120.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'frenos.jpg',
            'proveedor_id' => 1,
            'inventario_id' => 3,
        ]);

        Producto::create([
            'nombre' => 'Suspensión',
            'descripcion' => 'Reparación y ajuste de la suspensión del vehículo para una conducción suave.',
            'categoria_id' => 3,
            'precio' => 150.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'suspension.jpg',
            'proveedor_id' => 1,
            'inventario_id' => 4,
        ]);

        Producto::create([
            'nombre' => 'Dirección',
            'descripcion' => 'Reparación y mantenimiento del sistema de dirección del vehículo.',
            'proveedor_id' => 1,
            'categoria_id' => 3,
            'precio' => 100.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'direccion.jpg',
            'inventario_id' => 5,
        ]);

        Producto::create([
            'nombre' => 'Escape',
            'descripcion' => 'Reparación y ajuste del sistema de escape del vehículo.',
            'categoria_id' => 3,
            'proveedor_id' => 2,
            'precio' => 80.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'escape.jpg',
            'inventario_id' => 6,
        ]);

        Producto::create([
            'nombre' => 'Sistema eléctrico',
            'descripcion' => 'Diagnóstico y reparación de problemas eléctricos en el vehículo.',
            'categoria_id' => 3,
            'proveedor_id' => 2,
            'inventario_id' => 7,
            'precio' => 70.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'sistema_electrico.jpg',
        ]);

        Producto::create([
            'nombre' => 'Sistema de aire acondicionado',
            'descripcion' => 'Mantenimiento y reparación del sistema de aire acondicionado del vehículo.',
            'categoria_id' => 3,
            'proveedor_id' => 2,
            'inventario_id' => 8,
            'precio' => 90.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'aire_acondicionado.jpg',
        ]);

        Producto::create([
            'nombre' => 'Sistema de combustible',
            'descripcion' => 'Reparación y limpieza del sistema de combustible para un rendimiento óptimo.',
            'categoria_id' => 3,
            'proveedor_id' => 2,
            'inventario_id' => 9,
            'precio' => 110.00,
            'unidad_medida' => 'Reparación',
            'imagen' => 'combustible.jpg',
        ]);

        Producto::create([
            'nombre' => 'Accesorios',
            'descripcion' => 'Instalación y ajuste de accesorios en el vehículo.',
            'categoria_id' => 3,
            'proveedor_id' => 3,
            'precio' => 60.00,
            'inventario_id' => 10,
            'unidad_medida' => 'Reparación',
            'imagen' => 'accesorios.jpg',
        ]);

        Producto::create([
            'nombre' => 'Neumáticos de verano',
            'descripcion' => 'Neumáticos diseñados para un rendimiento óptimo en condiciones de verano.',
            'proveedor_id' => 3,
            'precio' => 120.00,
            'categoria_id' => 5,
            'inventario_id' => 11,
            'imagen' => 'neumaticos_verano.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Neumáticos de invierno',
            'descripcion' => 'Neumáticos diseñados para un mejor agarre en condiciones invernales.',
            'proveedor_id' => 3,
            'precio' => 140.00,
            'categoria_id' => 5,
            'inventario_id' => 12,
            'imagen' => 'neumaticos_invierno.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Neumáticos de todoterreno',
            'descripcion' => 'Neumáticos resistentes para vehículos todo terreno y todoterreno.',
            'precio' => 160.00,
            'categoria_id' => 5,
            'proveedor_id' => 3,
            'inventario_id' => 13,
            'imagen' => 'neumaticos_todoterreno.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Llantas',
            'descripcion' => 'Llantas de aleación y acero para vehículos, disponibles en varios tamaños y estilos.',
            'precio' => 80.00,
            'categoria_id' => 5,
            'proveedor_id' => 3,
            'inventario_id' => 14,
            'imagen' => 'llantas.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Aceite de motor',
            'descripcion' => 'Aceite de motor para el mantenimiento de vehículos.',
            'precio' => 25.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'inventario_id' => 15,
            'imagen' => 'aceite_motor.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido de frenos',
            'descripcion' => 'Líquido de frenos de alta calidad para mantener el sistema de frenos.',
            'precio' => 10.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'inventario_id' => 16,
            'imagen' => 'liquido_frenos.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido de transmisión',
            'descripcion' => 'Líquido de transmisión para el mantenimiento de la caja de cambios.',
            'precio' => 15.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'inventario_id' => 17,
            'imagen' => 'liquido_transmision.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido de dirección',
            'descripcion' => 'Líquido de dirección asistida para el sistema de dirección.',
            'precio' => 8.00,
            'categoria_id' => 6,
            'proveedor_id' => 3,
            'inventario_id' => 18,
            'imagen' => 'liquido_direccion.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido refrigerante',
            'descripcion' => 'Líquido refrigerante para mantener la temperatura del motor.',
            'precio' => 12.00,
            'categoria_id' => 6,
            'proveedor_id' => 2,
            'inventario_id' => 19,
            'imagen' => 'liquido_refrigerante.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Anticongelante',
            'descripcion' => 'Anticongelante para proteger el motor contra el congelamiento.',
            'precio' => 14.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'inventario_id' => 20,
            'imagen' => 'anticongelante.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Aditivos',
            'descripcion' => 'Aditivos para mejorar el rendimiento y protección del motor.',
            'precio' => 20.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'inventario_id' => 21,
            'imagen' => 'aditivos.jpg',
            'unidad_medida' => 'Botellas',
        ]);

    }
}

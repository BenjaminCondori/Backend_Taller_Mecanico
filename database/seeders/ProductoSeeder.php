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
            'nombre' => 'Neumáticos de verano',
            'descripcion' => 'Neumáticos diseñados para un rendimiento óptimo en condiciones de verano.',
            'proveedor_id' => 3,
            'precio_venta' => 120.00,
            'precio_compra' => 100.00,
            'categoria_id' => 5,
            'stock_disponible' => 100,
            'stock_minimo' => 5,
            'imagen' => 'neumaticos_verano.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Neumáticos de invierno',
            'descripcion' => 'Neumáticos diseñados para un mejor agarre en condiciones invernales.',
            'proveedor_id' => 3,
            'precio_venta' => 140.00,
            'precio_compra' => 120.00,
            'categoria_id' => 5,
            'stock_disponible' => 50,
            'stock_minimo' => 2,
            'imagen' => 'neumaticos_invierno.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Neumáticos de todoterreno',
            'descripcion' => 'Neumáticos resistentes para vehículos todo terreno y todoterreno.',
            'precio_venta' => 160.00,
            'precio_compra' => 150.00,
            'categoria_id' => 5,
            'proveedor_id' => 3,
            'stock_disponible' => 50,
            'stock_minimo' => 2,
            'imagen' => 'neumaticos_todoterreno.jpg',
            'unidad_medida' => 'Unidades',
        ]);

        Producto::create([
            'nombre' => 'Aceite de motor',
            'descripcion' => 'Aceite de motor para el mantenimiento de vehículos.',
            'precio_venta' => 25.00,
            'precio_compra' => 20.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'stock_disponible' => 70,
            'stock_minimo' => 3,
            'imagen' => 'aceite_motor.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido de frenos',
            'descripcion' => 'Líquido de frenos de alta calidad para mantener el sistema de frenos.',
            'precio_venta' => 100.00,
            'precio_compra' => 80.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'stock_disponible' => 90,
            'stock_minimo' => 5,
            'imagen' => 'liquido_frenos.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido de transmisión',
            'descripcion' => 'Líquido de transmisión para el mantenimiento de la caja de cambios.',
            'precio_venta' => 150.00,
            'precio_compra' => 120.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'stock_disponible' => 150,
            'stock_minimo' => 5,
            'imagen' => 'liquido_transmision.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido de dirección',
            'descripcion' => 'Líquido de dirección asistida para el sistema de dirección.',
            'precio_venta' => 10.00,
            'precio_compra' => 8.00,
            'categoria_id' => 6,
            'proveedor_id' => 3,
            'stock_disponible' => 150,
            'stock_minimo' => 5,
            'imagen' => 'liquido_direccion.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Líquido refrigerante',
            'descripcion' => 'Líquido refrigerante para mantener la temperatura del motor.',
            'precio_venta' => 120.00,
            'precio_compra' => 100.00,
            'categoria_id' => 6,
            'proveedor_id' => 2,
            'stock_disponible' => 150,
            'stock_minimo' => 5,
            'imagen' => 'liquido_refrigerante.jpg',
            'unidad_medida' => 'Litros',

        ]);

        Producto::create([
            'nombre' => 'Anticongelante',
            'descripcion' => 'Anticongelante para proteger el motor contra el congelamiento.',
            'precio_venta' => 70.00,
            'precio_compra' => 50.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'stock_disponible' => 100,
            'stock_minimo' => 5,
            'imagen' => 'anticongelante.jpg',
            'unidad_medida' => 'Litros',
        ]);

        Producto::create([
            'nombre' => 'Aditivos',
            'descripcion' => 'Aditivos para mejorar el rendimiento y protección del motor.',
            'precio_venta' => 20.00,
            'precio_compra' => 20.00,
            'categoria_id' => 6,
            'proveedor_id' => 4,
            'stock_disponible' => 100,
            'stock_minimo' => 2,
            'imagen' => 'aditivos.jpg',
            'unidad_medida' => 'Botellas',
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\OrdenDeTrabajo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenDeTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdenDeTrabajo::create([
            'fecha_creacion' => '2023-11-01 07:40:27',
            'fecha_inicio' => '2023-11-01',
            'fecha_fin' => '2023-11-05',
            'estado' => 'Reparado',
            'descripcion' => 'Se debe realizar una revisión de los frenos.',
            'descuento' => 10,
            'empleado_id' => 2,
            'cotizacion_id' => 1,
            'costo_total' => 855,
            'pago_id' => 1,
        ]);

        OrdenDeTrabajo::create([
            'fecha_creacion' => '2023-11-12 09:50:18',
            'fecha_inicio' => '2023-11-13',
            'fecha_fin' => '2023-11-15',
            'estado' => 'En proceso',
            'descripcion' => 'Se debe realizar la reparación del motor.',
            'descuento' => 0,
            'empleado_id' => 2,
            'cotizacion_id' => 2,
            'costo_total' => 275,
            'pago_id' => 2,
        ]);

        OrdenDeTrabajo::create([
            'fecha_creacion' => '2023-11-06 14:23:10',
            'fecha_inicio' => '2023-11-06',
            'fecha_fin' => '2023-11-08',
            'estado' => 'Esperando repuesto',
            'descripcion' => 'Se debe reparar los frenos.',
            'descuento' => 0,
            'empleado_id' => 2,
            'cotizacion_id' => 3,
            'costo_total' => 170,
            'pago_id' => 3,
        ]);

        OrdenDeTrabajo::create([
            'fecha_creacion' => '2023-11-15 11:30:08',
            'fecha_inicio' => '2023-11-15',
            'fecha_fin' => '2023-11-17',
            'estado' => 'En proceso',
            'descripcion' => 'Se realiza el alineado, reparación de frenos.',
            'descuento' => 0,
            'empleado_id' => 2,
            'cotizacion_id' => 4,
            'costo_total' => 120,
            'pago_id' => 4,
        ]);

        OrdenDeTrabajo::create([
            'fecha_creacion' => '2023-11-14 15:50:28',
            'fecha_inicio' => '2023-11-15',
            'fecha_fin' => '2023-11-20',
            'estado' => 'En proceso',
            'descripcion' => 'Revisión del sistema de seguridad.',
            'descuento' => 0,
            'empleado_id' => 2,
            'cotizacion_id' => 5,
            'costo_total' => 170,
            'pago_id' => 5,
        ]);

        OrdenDeTrabajo::create([
            'fecha_creacion' => '2023-11-08 10:51:14',
            'fecha_inicio' => '2023-11-08',
            'fecha_fin' => '2023-11-08',
            'estado' => 'Ingresado',
            'descripcion' => 'Se debe realizar el cambio de aceite y filtros.',
            'descuento' => 15,
            'empleado_id' => 2,
            'cotizacion_id' => 6,
            'costo_total' => 654.5,
            'pago_id' => 6,
        ]);
    }
}

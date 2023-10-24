<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermisoSeeder::class,
            RolSeeder::class,
            RolPermisoSeeder::class,
            UsuarioSeeder::class,
            ClienteSeeder::class,
            PuestoSeeder::class,
            EmpleadoSeeder::class,
            MarcaSeeder::class,
            ModeloSeeder::class,
            TipoVehiculoSeeder::class,
            VehiculoSeeder::class,
<<<<<<< HEAD
            ProveedorSeeder::class,
            CategoriaSeeder::class,
            InventarioSeeder::class,
            ServicioSeeder::class,
            ProductoSeeder::class,
=======
            DiagnosticoSeeder::class,
>>>>>>> tipovehiculo
        ]);
    }
}

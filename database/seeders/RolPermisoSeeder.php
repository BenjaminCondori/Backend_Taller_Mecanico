<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\RolPermiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol_id = 1;
        $permisos = Permiso::pluck('id');
        foreach ($permisos as $permiso_id) {
            RolPermiso::create([
                'rol_id' => $rol_id,
                'permiso_id' => $permiso_id,
            ]);
        }

        $rol_id = 2;
        for ($i = 13; $i < 17; $i++) {
            RolPermiso::create([
                'rol_id' => $rol_id,
                'permiso_id' => $i,
            ]);
        }

        $rol_id = 3;
        for ($i = 1; $i < 5; $i++) {
            RolPermiso::create([
                'rol_id' => $rol_id,
                'permiso_id' => $i,
            ]);
        }
    }
}

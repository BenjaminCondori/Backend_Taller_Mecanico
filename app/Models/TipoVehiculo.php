<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'tipo_vehiculos';

    protected $fillable = [
        'nombre',
    ];

    public function vehiculos(): HasMany {
        return $this->hasMany(Vehiculo::class, 'tipo_vehiculo_id');
    }

}

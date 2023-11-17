<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $fillable = [
        'url_imagen',
        'vehiculo_id'
    ];

    public function estadoVehiculo(): HasOne {
        return $this->hasOne(EstadoVehiculo::class, 'imagen_id');
    }
}

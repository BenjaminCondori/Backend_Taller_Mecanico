<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EstadoVehiculo extends Model
{
    use HasFactory;

    protected $table = 'estado_vehiculos';

    protected $fillable = [
        'estado',
        'fecha',
        'descripcion',
        'vehiculo_id',
    ];

    public function vehiculo(): BelongsTo {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function imagenes(): BelongsToMany {
        return $this->belongsToMany(Imagen::class, 'vehiculo:id');
    }

}

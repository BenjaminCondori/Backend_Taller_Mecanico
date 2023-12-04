<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'placa',
        'nro_chasis',
        'año',
        'color',
        'kilometraje',
        'combustible',
        'marca_id',
        'modelo_id',
        'cliente_id',
        'tipo_vehiculo_id',
    ];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function tipoVehiculo(): BelongsTo
    {
        return $this->belongsTo(TipoVehiculo::class, 'tipo_vehiculo_id');
    }

    public function estadosVehiculo(): HasMany
    {
        return $this->hasMany(EstadoVehiculo::class, 'vehiculo_id');
    }

    public function diagnosticos(): HasMany
    {
        return $this->hasMany(Diagnostico::class, 'vehiculo_id');
    }

    public function cotizaciones(): HasMany
    {
        return $this->hasMany(Cotizacion::class, 'vehiculo_id');
    }

    public function solicitudesAsistencia(): HasMany
    {
        return $this->hasMany(SolicitudAsistencia::class, 'vehiculo_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolicitudAsistencia extends Model
{
    use HasFactory;

    protected $table = 'solicitud_asistencias';

    protected $fillable = [
        'descripcion_problema',
        'fecha_solicitud',
        'latitud',
        'longitud',
        'direccion',
        'estado',
        'imagen',
        'audio',
        'cliente_id',
        'vehiculo_id',
        'tecnico_id',
        'servicio_id',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'tecnico_id');
    }

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

}

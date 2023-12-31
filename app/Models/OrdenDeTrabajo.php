<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrdenDeTrabajo extends Model
{
    use HasFactory;

    protected $table = 'orden_de_trabajos';

    protected $fillable = [
        'fecha_creacion',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'descuento',
        'costo_total',
        'mecanico_id',
        'cotizacion_id',
        'pago_id',
    ];

    public function mecanico(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'mecanico_id');
    }

    public function cotizacion(): BelongsTo
    {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id');
    }

    public function pago(): BelongsTo
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable = [
        'descripcion',
        'fecha',
        'precio',
        'cliente_id',
        'empleado_id',
        'vehiculo_id',
    ];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function empleado(): BelongsTo {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }


    public function servicios(): BelongsToMany {
        return $this->belongsToMany(Servicio::class, 'cotizacion_servicio', 'cotizacion_id', 'servicio_id')
        ->withPivot('servicio_cantidad', 'servicio_preciototal');
    }

    public function productos(): BelongsToMany {
        return $this->belongsToMany(Producto::class, 'cotizacion_producto', 'cotizacion_id', 'producto_id')
        ->withPivot('producto_cantidad', 'producto_preciototal');
    }

    public function vehiculo(): BelongsTo {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function ordenDeTrabajo(): HasOne {
        return $this->hasOne(OrdenDeTrabajo::class, 'cotizacion_id');
    }



}

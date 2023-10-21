<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable = [
        'descripcion',
        'fecha',
        'precio',
        'cliente_id',
        'vehiculo_id',
    ];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function servicios(): BelongsToMany {
        return $this->belongsToMany(Servicio::class, 'cotizacion_servicio', 'cotizacion_id', 'servicio_id');
    }

    public function productos(): BelongsToMany {
        return $this->belongsToMany(Producto::class, 'cotizacion_producto', 'cotizacion_id', 'producto_id');
    }

    public function vehiculo(): BelongsTo {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }


}

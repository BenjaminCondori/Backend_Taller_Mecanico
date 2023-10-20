<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
        'cotizacion_id',
    ];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function cotizacion(): BelongsTo {
        return $this->belongsTo(Cotizacion::class, 'cotizacion_id');
    }

    public function productos(): HasMany {
        return $this->hasMany(Producto::class, 'servicio_id');
    }

}

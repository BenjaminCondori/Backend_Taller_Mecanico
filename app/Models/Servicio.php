<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion',
        'categoria_id',
    ];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function cotizaciones(): BelongsToMany {
        return $this->belongsToMany(Cotizacion::class, 'cotizacion_servicio', 'servicio_id', 'cotizacion_id');
    }

    public function solicitudesAsistencia(): HasMany {
        return $this->hasMany(SolicitudAsistencia::class, 'servicio_id');
    }

}

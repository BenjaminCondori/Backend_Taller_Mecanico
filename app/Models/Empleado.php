<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'genero',
        'usuario_id',
        'puesto_id',
    ];

    public function usuario(): BelongsTo {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function puesto(): BelongsTo {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }

    public function reservas(): HasMany {
        return $this->hasMany(Reserva::class, 'empleado_id');
    }

    public function ordenesDeTrabajo(): HasMany {
        return $this->hasMany(OrdenDeTrabajo::class, 'empleado_id');
    }

    public function cotizaciones(): HasMany {
        return $this->hasMany(Cotizacion::class, 'empleado_id');
    }

}

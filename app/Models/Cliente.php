<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'genero',
        'usuario_id',
    ];

    public function usuario(): BelongsTo {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function vehiculos(): HasMany {
        return $this->hasMany(Vehiculo::class, 'cliente_id');
    }

    public function cotizaciones(): HasMany {
        return $this->hasMany(Cotizacion::class, 'cliente_id');
    }
    
    public function reservas(): HasMany {
        return $this->hasMany(Reserva::class, 'cliente_id');
    }

}

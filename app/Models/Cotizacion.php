<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable = [
        'descripcion',
        'fecha',
        'precio',
        'cliente_id',
    ];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function servicios(): BelongsTo {
        return $this->belongsTo(Servicio::class, 'cotizacion_id');
    }

}

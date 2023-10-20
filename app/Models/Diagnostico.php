<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnostico extends Model
{
    use HasFactory;

    protected $table = 'diagnosticos';

    protected $fillable = [
        'descripcion',
        'recomendaciones',
        'fecha',
        'vehiculo_id',
    ];

    public function vehiculo(): BelongsTo {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionServicio extends Model
{
    use HasFactory;

    protected $table = 'cotizacion_servicio';

    protected $fillable = [
        'servicio_cantidad',
        'servicio_preciototal',
        'cotizacion_id',
        'servicio_id',
    ];

}

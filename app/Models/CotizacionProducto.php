<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProducto extends Model
{
    use HasFactory;

    protected $table = 'cotizacion_producto';

    protected $fillable = [
        'producto_cantidad',
        'producto_preciototal',
        'cotizacion_id',
        'producto_id',
    ];

}

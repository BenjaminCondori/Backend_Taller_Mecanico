<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta_producto extends Model
{
    use HasFactory;
    protected $table = 'venta_producto';

    protected $fillable = [
        'venta_id',
        'producto_id',
        'producto_cantidad',
        'producto_preciototal',
    ];
}

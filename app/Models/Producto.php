<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_venta',
        'precio_compra',
        'unidad_medida',
        'stock_disponible',
        'stock_minimo',
        'imagen',
        'categoria_id',
        // 'inventario_id',
        'proveedor_id',
    ];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function cotizaciones(): BelongsToMany {
        return $this->belongsToMany(Cotizacion::class, 'cotizacion_producto', 'producto_id', 'cotizacion_id');
    }

    public function proveedor(): BelongsTo {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    // public function inventario(): BelongsTo {
    //     return $this->belongsTo(Inventario::class, 'inventario_id');
    // }

}

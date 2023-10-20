<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'unidad_medida',
        'imagen',
        'categoria_id',
        'servicio_id',
        'inventario_id',
        'proveedor_id',
    ];

    public function categoria(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function servicio(): BelongsTo {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function proveedor(): BelongsTo {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function inventario(): BelongsTo {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'monto',
        'proveedor_id',
    ];
    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'compra_producto', 'compra_id', 'producto_id')
            ->withPivot('producto_cantidad', 'producto_preciototal');
    }
}

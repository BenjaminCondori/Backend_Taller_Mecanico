<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $fillable = [
        'cantidad',
        'importe',
        'precio',
        'nota_compra_id',
        'producto_id',
    ];
    public function notaCompra()
    {
        return $this->belongsTo(NotaCompra::class, 'nota_compra_id', 'id');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}

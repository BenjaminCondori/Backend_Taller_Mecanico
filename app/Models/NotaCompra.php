<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    protected $table = 'nota_compra';
    protected $fillable = [
        'fecha',
        'hora',
        'total',
        'proveedor_id',
        'empleado_id',
    ];
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id', 'id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }
    public function detalleCompra()
    {
        return $this->hasMany(DetalleCompra::class, 'nota_compra_id', 'id');
    }
}

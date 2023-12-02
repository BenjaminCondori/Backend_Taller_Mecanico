<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'monto',
        'cliente_id',
        'pago_id',
    ];

    public function cliente(): BelongsTo {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function pago(): BelongsTo {
        return $this->belongsTo(Pago::class, 'pago_id');
    }
    // no se por que pago si funciona asi y no con venta_id wtffffffff

    public function productos(): BelongsToMany{
        return $this->belongsToMany(Producto::class, 'venta_producto','venta_id','producto_id')
        ->withPivot('producto_cantidad','producto_preciototal');
    }

}

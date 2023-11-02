<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Factura extends Model
{
    use HasFactory;
    
    protected $table = 'facturas';
    
    protected $fillable = [
        'fecha_emision',
        'detalle',
        'importe',
        'saldo',
        'monto_total',  
    ];
    
    public function pago(): HasOne
    {
        return $this->hasOne(Pago::class, 'factura_id');
    }
    
}

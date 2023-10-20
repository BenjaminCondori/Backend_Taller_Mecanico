<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'categoria_id',
    ];

    public function subcategorias(): HasMany {
        return $this->hasMany(Categoria::class, 'categoria_id');
    }

    public function categoriaPadre(): BelongsTo {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function servicios(): HasMany {
        return $this->hasMany(Servicio::class, 'categoria_id');
    }

    public function productos(): HasMany {
        return $this->hasMany(Producto::class, 'categoria_id');
    }

}

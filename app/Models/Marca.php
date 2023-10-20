<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $fillable = [
        'nombre',
    ];

    public function modelos(): HasMany {
        return $this->hasMany(Modelo::class, 'marca_id');
    }

    public function vehiculos(): HasMany {
        return $this->hasMany(Vehiculo::class, 'marca_id');
    }

}

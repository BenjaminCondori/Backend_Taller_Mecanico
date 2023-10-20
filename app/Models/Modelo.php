<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modelo extends Model
{
    use HasFactory;

    protected $table = 'modelos';

    protected $fillable = [
        'nombre',
        'marca_id',
    ];

    public function marca(): BelongsTo {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

}

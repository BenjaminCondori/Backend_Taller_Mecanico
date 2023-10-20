<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'email',
        'password',
        'rol_id',
    ];

    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function empleado(): HasOne {
        return $this->hasOne(Empleado::class, 'usuario_id');
    }

    public function cliente(): HasOne {
        return $this->hasOne(Cliente::class, 'usuario_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apaterno',
        'amaterno',
        'email',
        'password',
        'telefono',
        'activo'
    ];

    // Relación con Roles
    public function roles()
    {
        // Asegúrate de que el modelo Rol exista en App\Models\Rol
        return $this->belongsToMany(Rol::class, 'usuario_rol', 'usuario_id', 'rol_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = ['nombre', 'activo'];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}

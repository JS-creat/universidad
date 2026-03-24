<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['nombres', 'apellidos', 'codigo', 'email', 'carrera_id', 'turno_id', 'activo'];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}

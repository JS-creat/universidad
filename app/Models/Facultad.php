<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $fillable = ['nombre', 'codigo', 'activo'];

    // Una facultad tiene muchas carreras
    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }
}

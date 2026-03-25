<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Estudiante extends Authenticatable implements JWTSubject
{
    protected $table = 'estudiantes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'codigo',
        'email',
        'password',
        'carrera_id',
        'turno_id'
    ];

    protected $hidden = [
        'password'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}
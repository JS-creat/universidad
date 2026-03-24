<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // Estos dos métodos son OBLIGATORIOS para que JWT funcione
    // Le dice a JWT cuál es el identificador único del usuario (su id)
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Permite agregar datos extra al token (por ahora lo dejamos vacío)
    public function getJWTCustomClaims()
    {
        return [];
    }
}

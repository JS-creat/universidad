<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $fillable = [
        'mensaje',
        'stack_trace',
        'url',
        'metodo',
        'codigo_http'
    ];
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ErrorLog;
use Symfony\Component\HttpFoundation\Response;

class ErrorLogMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Si el código es 400 o más, o hay una excepción, lo guardamos
        if ($response->getStatusCode() >= 400 || !empty($response->exception)) {
            $e = $response->exception;

            ErrorLog::create([
                'mensaje'     => $e ? $e->getMessage() : 'Error HTTP ' . $response->getStatusCode(),
                'stack_trace' => $e ? substr($e->getTraceAsString(), 0, 1000) : 'Sin traza',
                'url'         => $request->fullUrl(),
                'metodo'      => $request->method(),
                'codigo_http' => $response->getStatusCode(),
            ]);
        }

        return $response;
    }
}

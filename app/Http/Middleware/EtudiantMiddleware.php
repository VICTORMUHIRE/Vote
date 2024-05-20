<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EtudiantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if($request->user() && $request->user()->role !== 'etudiant'){
            abort(403, "Acces interdit, cette page est reservee aux etudiant");
        }
        return $next($request);
    }
}

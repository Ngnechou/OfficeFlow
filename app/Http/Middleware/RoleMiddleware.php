<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est connecté et s'il a le rôle "admin"
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            // Rediriger avec message d’erreur
            return redirect('/')
                ->with('error', 'Accès refusé : vous n\'avez pas la permission d\'accéder à cette page.');
        }

        return $next($request);
    }
}

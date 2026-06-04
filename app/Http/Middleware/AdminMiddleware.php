<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()?->is_admin) {
            return redirect()->route('form')->with('status', [
                'type' => 'danger', 
                'message' => 'Você não tem permissão para acessar esta área!'
            ]);
        }
        return $next($request);
    }
}

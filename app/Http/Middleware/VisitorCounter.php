<?php

namespace App\Http\Middleware;

use App\Models\VisitorCounter as ModelsVisitorCounter;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ModelsVisitorCounter::create([
            'ip' => $request->ip(),
            'client_mac' => $request->header('x-client-mac') ?? preg_replace('/\s+/', '', substr(shell_exec('getmac'), 159,20))
        ]);

        return $next($request);
    }
}

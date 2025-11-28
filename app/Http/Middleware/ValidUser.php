<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
    {

  
        if(Auth::check()){
            return $next($request);
        }else{
             $loginUrl = url('/login');
            return response()->make("
                <script>
                    alert('You must be logged in to perform this action');
                    window.location.href = '{$loginUrl}';
                </script>
            ");
        }
    }
}

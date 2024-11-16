<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //Esta funçao gerencia permissões das requisições
    public function handle(Request $request, Closure $next, $token): Response{
        //Token nome do "parametro"general token é a chave
        if($request->header('token')!=$token){
            return response()->json(['error'=>'Invalid Token'], 401);
        }else{
            return $next($request);
        }
    }
}

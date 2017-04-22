<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // echo $_SESSION["nome_usuario"];

        if(!isset($_SESSION['id_usuario'])){
            return response('Não autorizado.',401);
        }else{
            if($_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT']){
                return response('Não autorizado.',401);
            }else{
                // session_regenerate_id();
                return $next($request);
            }
        }
    }
}

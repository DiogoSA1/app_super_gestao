<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next)
    {
        
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        
         return $next($request);

         //return redirect()->route('site.index');
        //return response('Chegamos e Finalizamos');
       
        /* $resposta = $next($request);

        $resposta->setStatusCode(201, 'status e texto modificados');

        

        return $resposta; */
    }
}

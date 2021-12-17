<?php

namespace App\Http\Middleware;
//App\Http\Middleware\AutenticacaoMiddleware
use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {

        session_start();
        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            redirect()->route('site.login', ['erro' => 2]);
        }


        //return $next($request);

        // verifica se o usuario tem acesso
        /* echo $metodo_autenticacao.' - '.$perfil.'</br>';

        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuario e senha no banco de dados'.$perfil.'</br>';
        }
        if($metodo_autenticacao == 'ldap'){
            echo 'verificar usuario e senha no AD'.$perfil.'</br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos';
        }else {
            echo'Carregar o perfil do banco de dados'; 
        }

        if(false){
            return $next($request);
        }else{
            return response("Acesso negado! rota exige autenticação");

        } */
    }
}

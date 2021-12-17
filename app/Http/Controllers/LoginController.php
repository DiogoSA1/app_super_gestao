<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Usuario e ou Senha não existe';
        }
        if($request->get('erro') == 2) {
            $erro = 'Necessario fazer login para ter acessar';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        
        // regras de validacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // feedbacks de validacao
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatorio.',
            'senha.required' => 'O campo senha é obrigatorio' 
        ];

        $request->validate($regras, $feedback);

        //recuperando os parametros do usuario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Iniciar Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
           
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}

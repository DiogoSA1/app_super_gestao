<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
       
        /* $contato = new SiteContato();
        $contato->nome = $request->input('nome'); 
        $contato->telefone = $request->input('telefone'); 
        $contato->email = $request->input('email'); 
        $contato->motivo_contato = $request->input('motivo_contato'); 
        $contato->mensagem = $request->input('mensagem'); 
        $contato->save(); */

       // $contato = new SiteContato();
       // $contato->create($request->all());
       
       $motivo_contatos = MotivoContato::all();
       return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
       
    }
    public function salvar(Request $request) {
        //SiteContato::create($request->all());

        $regras =[
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedbacks = [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'Este nome ja foi usado',
            'email.email' => 'O endreço de email não é valido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres',

            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedbacks);

            SiteContato::create($request->all());
            return redirect()->route('site.index');
            //return view('site.contato');
    }
}

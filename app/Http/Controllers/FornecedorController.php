<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
//use App\Models\Item;

class FornecedorController extends Controller
{
    public function index() {

        return view('app.fornecedor.index');

    } 
    
    public function listar(Request $request) {

        $fornecedores = Fornecedor::with(['produtos'])
        ->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(5);

        
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    
    public function adicionar(Request $request) {
        
        $msg = '';

        // Adiciona
        if($request->input('_token') != '' && $request->input('id') == '') {
            echo 'Cadastro';
            // cadastro
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [

                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 2 caracteres',
                'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo nome deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo nome deve ter no maximo 2 caracteres',
                'email.email' => 'O campo email não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $msg = 'Cadastro relaizado com Sucesso';

        }

        if($request->input('_token') != '' && $request->input('id') != '') {
            
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = "Atualização realizada com Sucesso";
            }else{
                
                $msg = "Erro ao tentar Atualizar o registro";
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg ]);
        }
        //print_r($request->all());


        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {

        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forcedelete();

        return redirect()->route('app.fornecedor.listar');
    }



        // $fornecedores = ['Fornecedor 1'];
        /* $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'status' => 'N', 
                'cnpj' => '',
                'ddd' => '11', // São Paulo (SP)
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', // Fortaleza (CE)
                'telefone' => '0000-0000'      
            ],
            2 => [
                'nome' => 'Fornecedor 2', 
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32', // Juiz de fora (MG)
                'telefone' => '0000-0000'      
            ]
        ];
        
        return view('app.fornecedor.index', compact('fornecedores'));  */
        /*
        condicao ? se verdade : se falso
        condicao ? se verdade : (condicao ? se verdade : se false)
        */
        /* $msg = isset($fornecedores[0]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não Informado';
        echo $msg; */

            //return view('app.fornecedor.index');
    
}


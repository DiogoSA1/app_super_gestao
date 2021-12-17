<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna que vai receber a fk de fornecedores
        Schema::table('products', function (Blueprint $table) {

            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'padrão SG',
                'site' => 'padraosg.com.br',
                'uf' => 'SP',
                'email' => 'padrao@sg.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign('products_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }   
}

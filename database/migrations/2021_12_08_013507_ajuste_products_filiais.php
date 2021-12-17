<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProductsFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criacao da tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30); 
            $table->timestamps();
        });

        // Criacao da tabela products_filiais
        Schema::create('products_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id'); 
            $table->unsignedBigInteger('product_id');
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->decimal('preco_venda', 8, 2);
            $table->timestamps();

            //foreign key (constraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('product_id')->references('id')->on('products');
        });

        // Removendo colunas da tabela products
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_maximo', 'estoque_minimo']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //  Adicionando colunas da tabela products
        Schema::table('products', function (Blueprint $table) {
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->decimal('preco_venda', 8, 2);
        });

        Schema::dropIfExists('products_filiais');

        Schema::dropIfExists('filiais');
    }
}

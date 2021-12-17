<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); // cm, mm, kg
            $table->string('descricao',30); // cm, mm, kg
            $table->timestamps();
        });
        // Adicionar o relacionamento com a tabela products
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        // Adicionar o relacionamento com a tabela products_details
        Schema::table('products_details', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remover o relacionamento com a tabela products_details
        Schema::table('products_details', function(Blueprint $table){
        // Remover a fk
            $table->dropForeign('products_details_unidade_id_foreign');
        // Remover a coluna unidade_id
            $table->dropcolumn('unidade_id');
        });
        
        // Remover o relacionamento com a tabela products
        Schema::table('products', function(Blueprint $table){
        // Remover a fk
            $table->dropForeign('products_unidade_id_foreign');
        // Remover a coluna unidade_id
            $table->dropcolumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}

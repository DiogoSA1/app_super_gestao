<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('nome', 100);
            $table->string('uf', 2);
            $table->string('email', 100);

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            // para remover colunas
            // $table->dropColumn('uf');
            // $table->dropColumn('email');
             $table->dropColumn(['email', 'uf']);
                        
        });
    }
}

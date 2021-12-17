<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_details', function (Blueprint $table) {
            // Colunas
            $table->id();
            $table->unsignedBigInteger('product_id'); // nome no singular
            $table->float('comprimento', 8, 2);
            $table->float('altura', 8, 2);
            $table->float('largura', 8, 2);
            $table->timestamps();

            // Constraint
            $table->foreign('product_id')->references('id')->on('products');
            $table->unique('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_details');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('sku', 20);
            $table->longText('description');
            $table->longText('Fulldescription');
            $table->string('image');
            $table->float('price');
            $table->float('stock');
            $table->integer('onSale');
            $table->date('onSaleDate');
            $table->float('onSalePrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

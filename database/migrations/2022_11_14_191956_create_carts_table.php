<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->string('description');
            $table->string('sku');
            $table->integer('quantity');
            $table->float('price');
            $table->string('image');
            $table->integer('status')->default(1)->comment('1 = active, 0 = inactive, 2 = sold'); 
            $table->timestamps();
            // $table->unique('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

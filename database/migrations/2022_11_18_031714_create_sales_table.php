<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id'); 
            $table->string("customer_name", 100);                               
            $table->string("customer_email", 100);                                            
            $table->string("customer_phone", 20);      
            $table->string("customer_address", 100);
            $table->string("customer_city", 100);
            $table->string("customer_state", 100);
            $table->string("customer_zip", 10);
            $table->string("customer_country", 100);
            $table->string("customer_notes", 100);
            $table->float('total');
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
        Schema::dropIfExists('sales');
    }
}

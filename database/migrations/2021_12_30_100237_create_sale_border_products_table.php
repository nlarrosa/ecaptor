<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleBorderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_border_products', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->string('lados');
            $table->string('type');
            $table->float('mts_lineal', 5);
            $table->float('unite_price', 5);
            $table->float('total_price', 5);
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
        Schema::dropIfExists('sale_border_products');
    }
}

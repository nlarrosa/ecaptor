<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaleProductIdToSaleSketchProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_sketch_products', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_product_id');
            $table->foreign('sale_product_id')->references('id')->on('sale_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_sketch_products', function (Blueprint $table) {
            $table->dropForeign('sale_sketch_products_sale_product_id_foreign');
            $table->dropColumn('sale_product_id');
        });
    }
}

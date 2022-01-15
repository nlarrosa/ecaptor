<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusSketchIdToSaleDesignProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_design_products', function (Blueprint $table) {
            $table->unsignedBigInteger('status_sketch_id');
            $table->foreign('status_sketch_id')->references('id')->on('status_sketch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_design_products', function (Blueprint $table) {
            $table->dropForeign('sale_design_products_status_sketch_id_foreign');
            $table->dropColumn('status_sketch_id');
        });
    }
}

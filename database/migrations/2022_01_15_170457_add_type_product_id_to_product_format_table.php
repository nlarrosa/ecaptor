<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeProductIdToProductFormatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_formats', function (Blueprint $table) {
            $table->unsignedBigInteger('type_product_id');
            $table->foreign('type_product_id')->references('id')->on('type_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_formats', function (Blueprint $table) {
            $table->dropForeign('product_formats_type_product_id_foreign');
            $table->dropColumn('type_product_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('line');
            $table->string('name_line');
            $table->text('desc_line');
            $table->text('name_product');
            $table->string('type_transit');
            $table->string('type_medida');
            $table->text('desc_product');
            $table->integer('width');
            $table->integer('height');
            $table->float('price',5);
            $table->float('price_suggest', 5);
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
        Schema::dropIfExists('product_uploads');
    }
}

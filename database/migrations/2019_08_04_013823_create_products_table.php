<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('catrgory_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->float('product_price',10,2 );
            $table->integer('product_quantity');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('main_image');
            $table->tinyInteger('publication_status');


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
        Schema::dropIfExists('products');
    }
}

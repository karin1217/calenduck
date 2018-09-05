<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->index()->comment('商品ID');
            $table->string('sku')->index()->comment('SKU属性');
            $table->decimal('price', 10, 2)->index()->comment('价格');
            $table->integer('stocks')->index()->comment('库存');
            $table->integer('sku_sales')->default(0)->index()->comment('SKU销量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_skus');
    }
}

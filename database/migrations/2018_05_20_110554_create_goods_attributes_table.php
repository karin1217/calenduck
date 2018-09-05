<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->index()->comment('商品ID');
            $table->integer('attribute_name_id')->index()->comment('属性名称ID');
            $table->integer('attribute_value_id')->index()->comment('属性值ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_attributes');
    }
}

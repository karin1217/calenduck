<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAttributeNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_attribute_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('属性名称');
            $table->integer('category_id')->comment('商品分类ID');
            $table->integer('parent_id')->comment('父属性ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_attribute_names');
    }
}

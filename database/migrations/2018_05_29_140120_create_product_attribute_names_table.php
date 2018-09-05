<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('属性名称');
            $table->integer('category_id')->comment('商品分类ID');
            $table->integer('parent_id')->default(0)->comment('父属性ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_names');
    }
}

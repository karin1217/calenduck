<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('商品名称');
            $table->integer('category_id')->default(0)->index()->comment('商品分类ID');
            $table->integer('seller_id')->default(1)->comment('卖家ID');
            $table->integer('spu_sales')->default(0)->comment('SPU销量');
            $table->integer('comments')->default(0)->index()->comment('评论数');
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
        Schema::dropIfExists('goods');
    }
}

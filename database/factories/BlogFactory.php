<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Blog::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('zh_CN');
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        //'user_id'       =>  '1',

//    $table->integer('category_id')->index()->unsigned()->comment('分类 ID');
//    $table->integer('reply_count')->default(0)->index()->unsigned()->comment('回复数量');
//    $table->integer('view_count')->default(0)->index()->unsigned()->comment('查看总数');
//    $table->integer('last_reply_user_id')->default(0)->index()->unsigned()->comment('最后回复的用户 ID');
//    $table->integer('order')->default(0)->comment('排序');
//    $table->text('excerpt')->comment('文章摘要，SEO 优化时使用');
//    $table->string('slug')->comment('SEO 友好的 URI')->nullable();
        'content'       =>  $faker->realText($maxNbChars = 200, $indexSize = 2),
        'title'         =>  $faker->realText(),
        'excerpt'       =>  $faker->realText(),
        'created_at'  =>  $date_time,
        'updated_at'  =>  $date_time,
    ];
});

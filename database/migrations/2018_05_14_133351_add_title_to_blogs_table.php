<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title')->index()->comment('帖子标题');
            $table->integer('category_id')->index()->unsigned()->comment('分类 ID');
            $table->integer('reply_count')->default(0)->index()->unsigned()->comment('回复数量');
            $table->integer('view_count')->default(0)->index()->unsigned()->comment('查看总数');
            $table->integer('last_reply_user_id')->default(0)->index()->unsigned()->comment('最后回复的用户 ID');
            $table->integer('order')->default(0)->comment('排序');
            $table->text('excerpt')->comment('文章摘要，SEO 优化时使用');
            $table->string('slug')->comment('SEO 友好的 URI')->nullable();
        });
    }

    /*
字段名称	        描述	        字段类型	        加索引缘由	    其他
title	        帖子标题	    字符串（String）	文章搜索	        无
body	        帖子内容	    文本（text）	    不需要	        无
user_id	        用户 ID	    整数（int）	    数据关联	        unsigned()
category_id	    分类 ID	    整数（int）	    数据关联	        unsigned()
reply_count	    回复数量	    整数（int）	    文章回复数量排序	unsigned(), default(0)
view_count	    查看总数	    整数（int）	    文章查看数量排序	unsigned(), default(0)
last_reply_user_id	最后回复的用户 ID	整数（int）	数据关联	unsigned(), default(0)
order	        可用来做排序使用	整数（int）	不需要	default(0)
excerpt	        文章摘要，SEO 优化时使用	文本（text）	不需要	无
slug	        SEO 友好的 URI	字符串（String）	不需要	nullable()
*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'title','category_id','reply_count','view_count',
                'last_reply_user_id','order','excerpt','slug'
            ]);
        });
    }
}

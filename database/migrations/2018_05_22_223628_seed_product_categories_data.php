<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedProductCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => '男装',
                'parent_id' => 0
            ],
            [
                'name' => '裤子',
                'parent_id' => 1
            ],
            [
                'name' => '外套',
                'parent_id' => 1
            ],
            [
                'name' => '内裤',
                'parent_id' => 1
            ],
            [
                'name' => '袜子',
                'parent_id' => 1
            ],

            [
                'name' => '女装',
                'parent_id' => 0
            ],
            [
                'name' => '裤子',
                'parent_id' => 6
            ],
            [
                'name' => '外套',
                'parent_id' => 6
            ],
            [
                'name' => '内裤',
                'parent_id' => 6
            ],
            [
                'name' => '袜子',
                'parent_id' => 6
            ],
        ];


        DB::table('product_categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('product_categories')->truncate();
    }
}

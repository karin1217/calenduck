<?php
ini_set('memory_limit', -1);
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = range(1, 50);

        // 所有分类 ID 数组，如：[1,2,3,4]
        $category_ids = Category::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $blogs = factory(Blog::class)->times(100)->make()->each(function ($blog) use ($faker, $user_ids, $category_ids) {

            $blog->user_id = $faker->randomElement($user_ids);

            $blog->category_id = $faker->randomElement($category_ids);

        });

        Blog::insert($blogs->toArray());
    }
}

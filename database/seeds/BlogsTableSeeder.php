<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;

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

        $faker = app(Faker\Generator::class);

        //var_dump(factory(Blog::class));exit;

        $blogs = factory(Blog::class)->times(100)->make()->each(function ($blog) use ($faker, $user_ids) {

            $blog->user_id = $faker->randomElement($user_ids);

        });

        Blog::insert($blogs->toArray());
    }
}

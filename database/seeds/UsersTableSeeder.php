<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        // 头像范围
        $range = range(1, 32);

        // 头像假数据
        foreach ($range as $index) {
            $avatars[] = '/uploads/images/png_avatars/'.$index.'.png';
        }

        // 生成数据集合
        $users = factory(User::class)
            ->times(50)
            ->make()
            ->each(function($user, $index)
            use ($faker, $avatars)
            {
                $user->avatar = $faker->randomElement($avatars);
            });

        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'karin1217';
        $user->email = 'karin1217@gmail.com';
        $user->password = bcrypt('passwd');
        $user->introduction = '只是一个热忠于 Laravel 框架的 PHP 爱好者。';
        $user->avatar = '/uploads/images/png_avatars/7.png';
        $user->is_admin = true;
        $user->activated = true;
        $user->save();

        $user->assignRole('Founder');

        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}

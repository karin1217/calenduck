<?php

use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(FansTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        Model::reguard();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 清缓存
        app()['cache']->forget('spatie.permission.cache');

        // 创建权限
        Permission::create(['name'  =>  'manage_products']);
        Permission::create(['name'  =>  'manage_users']);
        Permission::create(['name'  =>  'manage_blogs']);

        // 创建【站长】角色，并赋权限
        $founder = Role::create(['name' => 'Founder']);
        $founder->givePermissionTo([
            'manage_products','manage_users','manage_blogs'
        ]);

        // 创建【管理员】角色，并赋权限
        $maintainer = Role::create(['name' => 'Maintainer']);
        $maintainer->givePermissionTo('manage_blogs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清缓存
        app()['cache']->forget('spatie.permission.cache');

        $tableNames = config('permission.table_names');

        Model::unguard();
        foreach($tableNames as $tableName) {
            DB::table($tableName)->delete();
        }
        Model::reguard();

    }
}

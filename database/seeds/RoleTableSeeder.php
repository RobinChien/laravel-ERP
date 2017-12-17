<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_role_list = Permission::where('name', 'role-list')->first();
        $permission_role_create = Permission::where('name', 'role-create')->first();
        $permission_role_edit = Permission::where('name', 'role-edit')->first();
        $permission_role_delete = Permission::where('name', 'role-delete')->first();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrator';
        $admin->description = 'User has access to all system functionality';
        $admin->save();
        $admin->permissions()->attach($permission_role_list);
        $admin->permissions()->attach($permission_role_create);
        $admin->permissions()->attach($permission_role_edit);
        $admin->permissions()->attach($permission_role_delete);

        $shop_keeper = new Role();
        $shop_keeper->name = 'shop-keeper';
        $shop_keeper->display_name = 'Shop Keeper';
        $shop_keeper->description = 'User can create create data in the system';
        $shop_keeper->save();
        $shop_keeper->permissions()->attach($permission_role_create);


    }
}

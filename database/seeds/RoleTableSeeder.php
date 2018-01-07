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

        $permission_s01 = Permission::where('name', 's01')->first();
        $permission_user_index = Permission::where('name', 'user-index')->first();
        $permission_user_show = Permission::where('name', 'user-show')->first();
        $permission_user_create = Permission::where('name', 'user-create')->first();
        $permission_user_edit = Permission::where('name', 'user-edit')->first();
        $permission_user_status = Permission::where('name', 'user-status')->first();
        $permission_user_delete = Permission::where('name', 'user-delete')->first();
        $permission_role_index = Permission::where('name', 'role-index')->first();
        $permission_role_show = Permission::where('name', 'role-show')->first();
        $permission_role_create = Permission::where('name', 'role-create')->first();
        $permission_role_edit = Permission::where('name', 'role-edit')->first();
        $permission_role_delete = Permission::where('name', 'role-delete')->first();
        $permission_permission_index = Permission::where('name', 'permission-index')->first();
        $permission_permission_show = Permission::where('name', 'permission-show')->first();
        $permission_permission_edit = Permission::where('name', 'permission-edit')->first();
        $permission_permission_status = Permission::where('name', 'permission-status')->first();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrator';
        $admin->description = 'User has access to all system functionality';
        $admin->save();
        $admin->permissions()->attach($permission_s01);
        $admin->permissions()->attach($permission_user_index);
        $admin->permissions()->attach($permission_user_show);
        $admin->permissions()->attach($permission_user_create);
        $admin->permissions()->attach($permission_user_edit);
        $admin->permissions()->attach($permission_user_status);
        $admin->permissions()->attach($permission_user_delete);
        $admin->permissions()->attach($permission_permission_index);
        $admin->permissions()->attach($permission_permission_show);
        $admin->permissions()->attach($permission_permission_edit);
        $admin->permissions()->attach($permission_permission_status);
        $admin->permissions()->attach($permission_role_index);
        $admin->permissions()->attach($permission_role_show);
        $admin->permissions()->attach($permission_role_create);
        $admin->permissions()->attach($permission_role_edit);
        $admin->permissions()->attach($permission_role_delete);

        $shop_keeper = new Role();
        $shop_keeper->name = 'shop-keeper';
        $shop_keeper->display_name = 'Shop Keeper';
        $shop_keeper->description = 'User can create create data in the system';
        $shop_keeper->save();
        $shop_keeper->permissions()->attach($permission_s01);

    }
}

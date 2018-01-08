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
        $permission_s02 = Permission::where('name', 's02')->first();
        $permission_company_index = Permission::where('name', 'company-index')->first();
        $permission_company_show = Permission::where('name', 'company-show')->first();
        $permission_company_edit = Permission::where('name', 'company-edit')->first();
        $permission_employee_index = Permission::where('name', 'employee-index')->first();
        $permission_employee_show = Permission::where('name', 'employee-show')->first();
        $permission_employee_edit = Permission::where('name', 'employee-edit')->first();
        $permission_customer_index = Permission::where('name', 'customer-index')->first();
        $permission_customer_show = Permission::where('name', 'customer-show')->first();
        $permission_customer_create = Permission::where('name', 'customer-create')->first();
        $permission_customer_edit = Permission::where('name', 'customer-edit')->first();
        $permission_customer_status = Permission::where('name', 'customer-status')->first();
        $permission_manufacturer_index = Permission::where('name', 'manufacturer-index')->first();
        $permission_manufacturer_show = Permission::where('name', 'manufacturer-show')->first();
        $permission_manufacturer_create = Permission::where('name', 'manufacturer-create')->first();
        $permission_manufacturer_edit = Permission::where('name', 'manufacturer-edit')->first();
        $permission_manufacturer_status = Permission::where('name', 'manufacturer-status')->first();
        $permission_product_categories_index = Permission::where('name', 'product_categories-index')->first();
        $permission_product_categories_create = Permission::where('name', 'product_categories-create')->first();
        $permission_product_categories_edit = Permission::where('name', 'product_categories-edit')->first();
        $permission_product_index = Permission::where('name', 'product-index')->first();
        $permission_product_show = Permission::where('name', 'product-show')->first();
        $permission_product_create = Permission::where('name', 'product-create')->first();
        $permission_product_edit = Permission::where('name', 'product-edit')->first();
        $permission_product_status = Permission::where('name', 'product-status')->first();
        $permission_commoncode_index = Permission::where('name', 'commoncode-index')->first();
        $permission_commoncode_show = Permission::where('name', 'commoncode-show')->first();
        $permission_commoncode_create = Permission::where('name', 'commoncode-create')->first();
        $permission_commoncode_edit = Permission::where('name', 'commoncode-edit')->first();


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
        $admin->permissions()->attach($permission_s02);
        $admin->permissions()->attach($permission_company_index);
        $admin->permissions()->attach($permission_customer_show);
        $admin->permissions()->attach($permission_company_edit);
        $admin->permissions()->attach($permission_employee_index);
        $admin->permissions()->attach($permission_employee_show);
        $admin->permissions()->attach($permission_employee_edit);
        $admin->permissions()->attach($permission_customer_index);
        $admin->permissions()->attach($permission_customer_create);
        $admin->permissions()->attach($permission_customer_edit);
        $admin->permissions()->attach($permission_customer_status);
        $admin->permissions()->attach($permission_company_show);
        $admin->permissions()->attach($permission_manufacturer_index);
        $admin->permissions()->attach($permission_manufacturer_edit);
        $admin->permissions()->attach($permission_manufacturer_status);
        $admin->permissions()->attach($permission_manufacturer_show);
        $admin->permissions()->attach($permission_manufacturer_create);
        $admin->permissions()->attach($permission_product_categories_index);
        $admin->permissions()->attach($permission_product_categories_create);
        $admin->permissions()->attach($permission_product_categories_edit);
        $admin->permissions()->attach($permission_product_index);
        $admin->permissions()->attach($permission_product_show);
        $admin->permissions()->attach($permission_product_create);
        $admin->permissions()->attach($permission_product_edit);
        $admin->permissions()->attach($permission_product_status);
        $admin->permissions()->attach($permission_commoncode_index);
        $admin->permissions()->attach($permission_commoncode_show);
        $admin->permissions()->attach($permission_commoncode_create);
        $admin->permissions()->attach($permission_commoncode_edit);

        $shop_keeper = new Role();
        $shop_keeper->name = 'shop-keeper';
        $shop_keeper->display_name = 'Shop Keeper';
        $shop_keeper->description = 'User can create create data in the system';
        $shop_keeper->save();
        $shop_keeper->permissions()->attach($permission_s01);

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*
     * s01:user->9, role->10, permission->11
     * s02:company->12, employee->13, customer->14, manufacturer->15, product_categories->16, product->17
     * */
    public function run()
    {
        $permissions = [
            /*第一層*/
            [
                'name' => 's01',
                'parent_id' => '#',
                'display_name' => '系統管理',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's02',
                'parent_id' => '#',
                'display_name' => '基本資料管理',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's03',
                'parent_id' => '#',
                'display_name' => '進貨管理',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's04',
                'parent_id' => '#',
                'display_name' => '銷貨管理',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's05',
                'parent_id' => '#',
                'display_name' => '庫存管理',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's06',
                'parent_id' => '#',
                'display_name' => '會計管理',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's07',
                'parent_id' => '#',
                'display_name' => '銀行票據',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's08',
                'parent_id' => '#',
                'display_name' => '統計報表',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            /*第二層*/
            [
                'name' => 'user-index',
                'parent_id' => '1',
                'display_name' => '帳號管理',
                'description' => '#',
                'status' => '1',
                'route'=>'users.index'
            ],
            [
                'name' => 'role-index',
                'parent_id' => '1',
                'display_name' => '群組管理',
                'description' => '#',
                'status' => '1',
                'route'=>'roles.index'
            ],
            [
                'name' => 'permission-index',
                'parent_id' => '1',
                'display_name' => '權限管理',
                'description' => '#',
                'status' => '1',
                'route'=>'permissions.index'
            ],
            [
                'name' => 'company-index',
                'parent_id' => '2',
                'display_name' => '公司資料',
                'description' => '#',
                'status' => '1',
                'route'=>'company.index'
            ],
            [
                'name' => 'employee-index',
                'parent_id' => '2',
                'display_name' => '員工資料',
                'description' => '#',
                'status' => '1',
                'route'=>'employee.index'
            ],
            [
                'name' => 'customer-index',
                'parent_id' => '2',
                'display_name' => '客戶資料',
                'description' => '#',
                'status' => '1',
                'route'=>'customer.index'
            ],
            [
                'name' => 'manufacturer-index',
                'parent_id' => '2',
                'display_name' => '廠商資料',
                'description' => '#',
                'status' => '1',
                'route'=>'manufacturer.index'
            ],
            [
                'name' => 'product_categories-index',
                'parent_id' => '2',
                'display_name' => '商品分類',
                'description' => '#',
                'status' => '1',
                'route'=>'product_categories.index'
            ],
            [
                'name' => 'product-index',
                'parent_id' => '2',
                'display_name' => '商品資料',
                'description' => '#',
                'status' => '1',
                'route'=>'product.index'
            ],
            [
                'name' => 'commoncode-index',
                'parent_id' => '2',
                'display_name' => '通用代碼',
                'description' => '#',
                'status' => '1',
                'route'=>'commoncode.index'
            ],
            [
                'name' => 'purchase-index',
                'parent_id' => '3',
                'display_name' => '進貨維護',
                'description' => '#',
                'status' => '1',
                'route'=>'purchase.index'
            ],
            [
                'name' => 'purchase_return-index',
                'parent_id' => '3',
                'display_name' => '退貨維護',
                'description' => '#',
                'status' => '1',
                'route'=>'purchase_return.index'
            ],
            [
                'name' => 'sale-index',
                'parent_id' => '4',
                'display_name' => '銷貨維護',
                'description' => '#',
                'status' => '1',
                'route'=>'sale.index'
            ],
            [
                'name' => 'sale_return-index',
                'parent_id' => '4',
                'display_name' => '退貨處理',
                'description' => '#',
                'status' => '1',
                'route'=>'sale_return.index'
            ],

            /*第三層*/
            [
                'name' => 'user-show',
                'parent_id' => '9',
                'display_name' => '帳號內容',
                'description' => '顯示帳號內容',
                'status' => '1',
                'route'=>'users.show'
            ],
            [
                'name' => 'user-create',
                'parent_id' => '9',
                'display_name' => '帳號新增',
                'description' => '帳號新增',
                'status' => '1',
                'route'=>'users.create'
            ],
            [
                'name' => 'user-edit',
                'parent_id' => '9',
                'display_name' => '帳號修改',
                'description' => '帳號修改',
                'status' => '1',
                'route'=>'users.edit'
            ],
            [
                'name' => 'user-status',
                'parent_id' => '9',
                'display_name' => '帳號狀態',
                'description' => '帳號啟用|禁用',
                'status' => '1',
                'route'=>'users.status'
            ],
            [
                'name' => 'user-delete',
                'parent_id' => '9',
                'display_name' => '帳號刪除',
                'description' => '帳號刪除',
                'status' => '1',
                'route'=>'users.destroy'
            ],
            [
                'name' => 'role-show',
                'parent_id' => '10',
                'display_name' => '角色內容',
                'description' => '顯示角色內容',
                'status' => '1',
                'route'=>'roles.show'
            ],
            [
                'name' => 'role-create',
                'parent_id' => '10',
                'display_name' => '角色新增',
                'description' => '角色新增',
                'status' => '1',
                'route'=>'roles.create'
            ],
            [
                'name' => 'role-edit',
                'parent_id' => '10',
                'display_name' => '角色修改',
                'description' => '角色修改',
                'status' => '1',
                'route'=>'roles.edit'
            ],
            [
                'name' => 'role-delete',
                'parent_id' => '10',
                'display_name' => '角色刪除',
                'description' => '角色刪除',
                'status' => '1',
                'route'=>'roles.destroy'
            ],
            [
                'name' => 'permission-show',
                'parent_id' => '11',
                'display_name' => '權限內容',
                'description' => '顯示權限內容',
                'status' => '1',
                'route'=>'permissions.show'
            ],
            [
                'name' => 'permission-edit',
                'parent_id' => '11',
                'display_name' => '權限修改',
                'description' => '權限修改',
                'status' => '1',
                'route'=>'permissions.edit'
            ],
            [
                'name' => 'permission-status',
                'parent_id' => '11',
                'display_name' => '權限狀態',
                'description' => '權限顯示|不顯示',
                'status' => '1',
                'route'=>'permissions.status'
            ],
            [
                'name' => 'company-show',
                'parent_id' => '12',
                'display_name' => '公司資料內容',
                'description' => '公司資料內容',
                'status' => '1',
                'route'=>'company.show'
            ],
            [
                'name' => 'company-edit',
                'parent_id' => '12',
                'display_name' => '公司資料修改',
                'description' => '公司資料修改',
                'status' => '1',
                'route'=>'company.edit'
            ],
            [
                'name' => 'employee-show',
                'parent_id' => '13',
                'display_name' => '員工資料',
                'description' => '顯示員工資料',
                'status' => '1',
                'route'=>'employees.show'
            ],
            [
                'name' => 'employee-edit',
                'parent_id' => '13',
                'display_name' => '員工資料修改',
                'description' => '員工資料修改',
                'status' => '1',
                'route'=>'employee.edit'
            ],
            [
                'name' => 'customer-show',
                'parent_id' => '14',
                'display_name' => '客戶資料',
                'description' => '顯示客戶資料',
                'status' => '1',
                'route'=>'customer.show'
            ],
            [
                'name' => 'customer-create',
                'parent_id' => '14',
                'display_name' => '客戶資料新增',
                'description' => '客戶資料新增',
                'status' => '1',
                'route'=>'customer.create'
            ],
            [
                'name' => 'customer-edit',
                'parent_id' => '14',
                'display_name' => '客戶資料修改',
                'description' => '客戶資料修改',
                'status' => '1',
                'route'=>'customer.edit'
            ],
            [
                'name' => 'customer-status',
                'parent_id' => '14',
                'display_name' => '客戶狀態',
                'description' => '客戶啟用|禁用',
                'status' => '1',
                'route'=>'customer.status'
            ],
            [
                'name' => 'manufacturer-show',
                'parent_id' => '15',
                'display_name' => '廠商資料',
                'description' => '廠商資料顯示',
                'status' => '1',
                'route'=>'manufacturer.create'
            ],
            [
                'name' => 'manufacturer-create',
                'parent_id' => '15',
                'display_name' => '廠商資料新增',
                'description' => '廠商資料新增',
                'status' => '1',
                'route'=>'manufacturer.create'
            ],
            [
                'name' => 'manufacturer-edit',
                'parent_id' => '15',
                'display_name' => '廠商資料修改',
                'description' => '廠商資料修改',
                'status' => '1',
                'route'=>'manufacturer.edit'
            ],
            [
                'name' => 'manufacturer-status',
                'parent_id' => '15',
                'display_name' => '廠商狀態',
                'description' => '廠商啟用|禁用',
                'status' => '1',
                'route'=>'manufacturer.status'
            ],
            [
                'name' => 'product_categories-create',
                'parent_id' => '16',
                'display_name' => '商品類別新增',
                'description' => '商品類別新增',
                'status' => '1',
                'route'=>'product_categories.create'
            ],
            [
                'name' => 'product_categories-edit',
                'parent_id' => '16',
                'display_name' => '商品類別修改',
                'description' => '商品類別修改',
                'status' => '1',
                'route'=>'product_categories.edit'
            ],
            [
                'name' => 'product-show',
                'parent_id' => '17',
                'display_name' => '商品資料',
                'description' => '商品資料顯示',
                'status' => '1',
                'route'=>'product.create'
            ],
            [
                'name' => 'product-create',
                'parent_id' => '17',
                'display_name' => '商品新增',
                'description' => '商品新增',
                'status' => '1',
                'route'=>'product.create'
            ],
            [
                'name' => 'product-edit',
                'parent_id' => '17',
                'display_name' => '商品修改',
                'description' => '商品修改',
                'status' => '1',
                'route'=>'product.edit'
            ],
            [
                'name' => 'product-status',
                'parent_id' => '17',
                'display_name' => '商品狀態',
                'description' => '商品上架|下架',
                'status' => '1',
                'route'=>'product.status'
            ],
            [
                'name' => 'commoncode-show',
                'parent_id' => '18',
                'display_name' => '通用代碼資料',
                'description' => '通用代碼顯示',
                'status' => '1',
                'route'=>'commoncode.create'
            ],
            [
                'name' => 'commoncode-create',
                'parent_id' => '18',
                'display_name' => '通用代碼新增',
                'description' => '通用代碼新增',
                'status' => '1',
                'route'=>'commoncode.create'
            ],
            [
                'name' => 'commoncode-edit',
                'parent_id' => '18',
                'display_name' => '通用代碼修改',
                'description' => '通用代碼修改',
                'status' => '1',
                'route'=>'commoncode.edit'
            ],
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}

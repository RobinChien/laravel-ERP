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
     * s02:companyinfo->12, employeeinfo->13, clientinfo->14, vendorinfo->15, productcategory->16, productinfo->17
     * */
    public function run()
    {
        $permissions = [
            /*第一層*/
            [
                'name' => 's01',
                'parent_id' => '#',
                'display_name' => '系統管理',
                'description' => '#'
            ],
            [
                'name' => 's02',
                'parent_id' => '#',
                'display_name' => '基本資料管理',
                'description' => '#'
            ],
            [
                'name' => 's03',
                'parent_id' => '#',
                'display_name' => '進貨管理',
                'description' => '#'
            ],
            [
                'name' => 's04',
                'parent_id' => '#',
                'display_name' => '銷貨管理',
                'description' => '#'
            ],
            [
                'name' => 's05',
                'parent_id' => '#',
                'display_name' => '庫存管理',
                'description' => '#'
            ],
            [
                'name' => 's06',
                'parent_id' => '#',
                'display_name' => '會計管理',
                'description' => '#'
            ],
            [
                'name' => 's07',
                'parent_id' => '#',
                'display_name' => '銀行票據',
                'description' => '#'
            ],
            [
                'name' => 's08',
                'parent_id' => '#',
                'display_name' => '統計報表',
                'description' => '#'
            ],
            /*第二層*/
            [
                'name' => 'user',
                'parent_id' => '1',
                'display_name' => '帳號管理',
                'description' => '#'
            ],
            [
                'name' => 'role',
                'parent_id' => '1',
                'display_name' => '群組管理',
                'description' => '#'
            ],
            [
                'name' => 'permission',
                'parent_id' => '1',
                'display_name' => '權限管理',
                'description' => '#'
            ],
            [
                'name' => 'companyinfo',
                'parent_id' => '2',
                'display_name' => '公司資料',
                'description' => '#'
            ],
            [
                'name' => 'employeeinfo',
                'parent_id' => '2',
                'display_name' => '員工資料',
                'description' => '#'
            ],
            [
                'name' => 'clientinfo',
                'parent_id' => '2',
                'display_name' => '客戶資料',
                'description' => '#'
            ],
            [
                'name' => 'vendorinfo',
                'parent_id' => '2',
                'display_name' => '廠商資料',
                'description' => '#'
            ],
            [
                'name' => 'productcategory',
                'parent_id' => '2',
                'display_name' => '商品分類',
                'description' => '#'
            ],
            [
                'name' => 'productinfo',
                'parent_id' => '2',
                'display_name' => '商品分類',
                'description' => '#'
            ],
            /*第三層*/
            [
                'name' => 'user-view',
                'parent_id' => '9',
                'display_name' => '帳號列表',
                'description' => '顯示帳號列表'
            ],
            [
                'name' => 'user-create',
                'parent_id' => '9',
                'display_name' => '帳號新增',
                'description' => '帳號新增'
            ],
            [
                'name' => 'user-edit',
                'parent_id' => '9',
                'display_name' => '帳號修改',
                'description' => '帳號修改'
            ],
            [
                'name' => 'user-status',
                'parent_id' => '9',
                'display_name' => '帳號狀態',
                'description' => '帳號啟用|禁用'
            ],
            [
                'name' => 'user-delete',
                'parent_id' => '9',
                'display_name' => '帳號刪除',
                'description' => '帳號刪除'
            ],
            [
                'name' => 'role-view',
                'parent_id' => '10',
                'display_name' => '群組列表',
                'description' => '顯示群組列表'
            ],
            [
                'name' => 'role-create',
                'parent_id' => '10',
                'display_name' => '角色新增',
                'description' => '角色新增'
            ],
            [
                'name' => 'role-edit',
                'parent_id' => '10',
                'display_name' => '角色修改',
                'description' => '角色修改'
            ],
            [
                'name' => 'role-delete',
                'parent_id' => '10',
                'display_name' => '角色刪除',
                'description' => '角色刪除'
            ],
            [
                'name' => 'permission-view',
                'parent_id' => '11',
                'display_name' => '權限列表',
                'description' => '顯示權限列表'
            ],
            [
                'name' => 'permission-create',
                'parent_id' => '11',
                'display_name' => '權限新增',
                'description' => '權限新增'
            ],
            [
                'name' => 'permission-edit',
                'parent_id' => '11',
                'display_name' => '權限修改',
                'description' => '權限修改'
            ],
            [
                'name' => 'permission-status',
                'parent_id' => '11',
                'display_name' => '權限狀態',
                'description' => '權限顯示|不顯示'
            ],
            [
                'name' => 'permission-delete',
                'parent_id' => '11',
                'display_name' => '權限刪除',
                'description' => '權限刪除'
            ],
            [
                'name' => 'companyinfo-view',
                'parent_id' => '12',
                'display_name' => '公司資料顯示',
                'description' => '公司資料顯示'
            ],
            [
                'name' => 'companyinfo-edit',
                'parent_id' => '12',
                'display_name' => '公司資料修改',
                'description' => '公司資料修改'
            ],
            [
                'name' => 'employeeinfo-view',
                'parent_id' => '13',
                'display_name' => '員工列表顯示',
                'description' => '員工列表顯示'
            ],
            [
                'name' => 'employeeinfo-edit',
                'parent_id' => '13',
                'display_name' => '員工資料修改',
                'description' => '員工資料修改'
            ],
            [
                'name' => 'clientinfo-view',
                'parent_id' => '14',
                'display_name' => '客戶列表顯示',
                'description' => '客戶列表顯示'
            ],
            [
                'name' => 'clientinfo-create',
                'parent_id' => '14',
                'display_name' => '客戶資料新增',
                'description' => '客戶資料新增'
            ],
            [
                'name' => 'clientinfo-edit',
                'parent_id' => '14',
                'display_name' => '客戶資料修改',
                'description' => '客戶資料修改'
            ],
            [
                'name' => 'clientinfo-status',
                'parent_id' => '14',
                'display_name' => '客戶資料狀態',
                'description' => '客戶資料啟用|禁用'
            ],
            [
                'name' => 'clientinfo-delete',
                'parent_id' => '14',
                'display_name' => '客戶資料刪除',
                'description' => '客戶資料刪除'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}

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
                'name' => 'companyinfo-index',
                'parent_id' => '2',
                'display_name' => '公司資料',
                'description' => '#',
                'status' => '1',
                'route'=>'companyinfos.index'
            ],
            [
                'name' => 'employeeinfo-index',
                'parent_id' => '2',
                'display_name' => '員工資料',
                'description' => '#',
                'status' => '1',
                'route'=>'employeeinfos.index'
            ],
            [
                'name' => 'clientinfo-index',
                'parent_id' => '2',
                'display_name' => '客戶資料',
                'description' => '#',
                'status' => '1',
                'route'=>'clientinfos.index'
            ],
            [
                'name' => 'vendorinfo-index',
                'parent_id' => '2',
                'display_name' => '廠商資料',
                'description' => '#',
                'status' => '1',
                'route'=>'vendorinfos.index'
            ],
            [
                'name' => 'productcategory-index',
                'parent_id' => '2',
                'display_name' => '商品分類',
                'description' => '#',
                'status' => '1',
                'route'=>'peoductcategories.index'
            ],
            [
                'name' => 'productinfo-index',
                'parent_id' => '2',
                'display_name' => '商品分類',
                'description' => '#',
                'status' => '1',
                'route'=>'productinfos.index'
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
                'name' => 'companyinfo-edit',
                'parent_id' => '12',
                'display_name' => '公司資料修改',
                'description' => '公司資料修改',
                'status' => '1',
                'route'=>'companyinfos.edit'
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
                'name' => 'employeeinfo-edit',
                'parent_id' => '13',
                'display_name' => '員工資料修改',
                'description' => '員工資料修改',
                'status' => '1',
                'route'=>'employeeinfos.edit'
            ],
            [
                'name' => 'clientinfos-show',
                'parent_id' => '14',
                'display_name' => '客戶資料',
                'description' => '顯示客戶資料',
                'status' => '1',
                'route'=>'clientinfos.show'
            ],
            [
                'name' => 'clientinfo-create',
                'parent_id' => '14',
                'display_name' => '客戶資料新增',
                'description' => '客戶資料新增',
                'status' => '1',
                'route'=>'clientinfos.create'
            ],
            [
                'name' => 'clientinfo-edit',
                'parent_id' => '14',
                'display_name' => '客戶資料修改',
                'description' => '客戶資料修改',
                'status' => '1',
                'route'=>'clientinfos.edit'
            ],
            [
                'name' => 'clientinfo-status',
                'parent_id' => '14',
                'display_name' => '客戶資料狀態',
                'description' => '客戶資料啟用|禁用',
                'status' => '1',
                'route'=>'clientinfos.status'
            ],
            [
                'name' => 'clientinfo-delete',
                'parent_id' => '14',
                'display_name' => '客戶資料刪除',
                'description' => '客戶資料刪除',
                'status' => '1',
                'route'=>'clientinfos.destroy'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}

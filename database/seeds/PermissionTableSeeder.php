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
    public function run()
    {
        $permissions=[
                [
                    'name' => 'roles-list',
                    'display_name' => 'Display Role Listing',
                    'description' => 'See only Listing Of Role'
                ],
                [
                    'name' => 'roles-create',
                    'display_name' => 'Create Role',
                    'description' => 'Create New Role'
                ],
                [
                    'name' => 'roles-edit',
                    'display_name' => 'Edit Role',
                    'description' => 'Edit Role'
                ],
                [
                    'name' => 'roles-delete',
                    'display_name' => 'Delete Role',
                    'description' => 'Delete Role'
                ]
        ];

        foreach ($permissions as $key => $value){
            Permission::create($value);
        }
    }
}

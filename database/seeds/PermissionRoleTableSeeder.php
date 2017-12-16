<?php

use Illuminate\Database\Seeder;
use App\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'permission_id' => '1',
                'role_id' => '1'
            ],
            [
                'permission_id' => '2',
                'role_id' => '1'
            ],
            [
                'permission_id' => '3',
                'role_id' => '1'
            ],
            [
                'permission_id' => '4',
                'role_id' => '1'
            ],
            [
                'permission_id' => '2',
                'role_id' => '2'
            ]
        ];

        foreach ($roles as $key => $value) {
            PermissionRole::create($value);
        }
    }
}

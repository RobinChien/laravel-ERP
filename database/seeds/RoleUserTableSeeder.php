<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class RoleUserTableSeeder extends Seeder
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
                'user_id' => '1',
                'role_id' => '1'
            ]
        ];

        foreach ($roles as $key => $value) {
            RoleUser::create($value);
        }
    }
}

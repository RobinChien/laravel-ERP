<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $super = new User();
        $super->name = 'super';
        $super->email = 'abc@gmail.com';
        $super->password = bcrypt('123456');
        $super->save();
        $super->roles()->attach($role_admin);

    }
}

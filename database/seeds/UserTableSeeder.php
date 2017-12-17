<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Carbon\Carbon;

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
        $super->user_name = 'super';
        $super->user_email = 'super@gmail.com';
        $super->password = bcrypt('123456');
        $super->user_addr = 'address';
        $super->user_phone = '0912345678';
        $super->user_status = 1;
        $super->user_birth = Carbon::parse('2000-01-01');
        $super->save();
        $super->roles()->attach($role_admin);

    }
}

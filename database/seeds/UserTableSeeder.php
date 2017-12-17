<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user=[
          [
              'user_name' => 'super',
              'user_email' =>'super@gmail.com',
              'password' => Hash::make('123456'),
              'user_addr' =>'test',
              'user_phone' =>'0912345678',
              'user_status' =>1,
              'user_birth' =>Carbon::parse('2000-01-01'),
          ]
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}

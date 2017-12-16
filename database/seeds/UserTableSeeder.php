<?php

use Illuminate\Database\Seeder;
use App\User;

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
              'name' => 'super',
              'email' => 'abc@gmail.com',
              'password' => Hash::make('123456')
          ]
        ];

        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}

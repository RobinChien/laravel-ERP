<?php

use App\Common_Code;
use Illuminate\Database\Seeder;

class CommonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = new Common_Code();
        $super->code_name = '袋';
        $super->parent_id = '#';
        $super->permission_id = '2';
        
        $super->save();
    }
}

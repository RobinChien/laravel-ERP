<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        factory(App\Manufacturer::class,10)->create();
        factory(App\Product_Category::class,10)->create();
        factory(App\Product::class,100)->create();

    }
}

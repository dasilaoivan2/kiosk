<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
//        $this->call(OfficesTableSeeder::class);
        $this->call(BarangaysTableSeeder::class);
        // $this->call(UserSeeder::class);
    }
}

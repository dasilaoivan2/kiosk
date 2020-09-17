<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') != 'production')
        {
            $password = Hash::make('jigs');

            $users = [
                ['email' => 'juneljigjimenez@gmail.com',
                'name' =>'Junel Jig G. Jimenez',
                'password' => $password,'created_at'=>'2019-12-12 08:31:11','updated_at'=>'2019-12-12 08:31:11'
            ],
            [
                ['email' => 'dasilaoivan2@gmail.com',
                'name' =>'Ivan Dasilao',
                'password' => Hash::make('mingkhalifa2'),'created_at'=>'2019-12-12 08:31:11','updated_at'=>'2019-12-12 08:31:11']
        ]
            ];

            foreach ($users as $user)

            App\Admin::insert($user);
        }
    }
}

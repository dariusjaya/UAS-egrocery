<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('accounts')->insert([
            'gender_id' => 1,
            'role_id' => 1,
            'first_name'=> 'John',
            'last_name'=> 'Wick',
            'email' => 'testadmin@gmail.com',
            'display_picture_link' => 'https://randompicturegenerator.com/img/dragon-generator/gc87a8b163323bc5a343c84ed4965bd0d7be3febfb50e01c8c077fc6237ae12c3de6d3b707a66630dbf2d47e540ee27a8_640.jpg',
            'password' => bcrypt('testadmin@gmail.com')
        ]);

        DB::table('accounts')->insert([
            'gender_id' => 2,
            'role_id' => 2,
            'first_name'=> 'Leone',
            'last_name'=> 'Lewis',
            'email' => 'testuser@gmail.com',
            'display_picture_link' => 'https://randompicturegenerator.com/img/lion-generator/g1f474595f58941fdf5c66fbcab3dddc56adbc9e191c55c620323e17d99dd302a3fc5826475d80959852a04311efd1d00_640.jpg',
            'password' => bcrypt('testuser@gmail.com')
        ]);
    }
}

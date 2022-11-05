<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   //DBファサード読み込み
use Illuminate\Support\Facades\Hash; 

class admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'aaa@test.com',
            'password' => Hash::make('11111111'),
            'role' => '1'
        ]);
    }
}

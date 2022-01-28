<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin NewLand',
            'email' => 'adminnewland@gmail.com',
            'phone' => '0333333333',
            'surplus' => '100000000', //số dư
            'level' => '1', //số dư
            'password' => Hash::make('adminnewland'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'căn hộ chung cư',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'nhà riêng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'biệt thự, liền kề',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'mặt phố',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'nền dự án',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'đất',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'trang trại, khu nghỉ dưỡng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'condotel',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'kho, nhà xưởng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'bất động sản khác',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'căn hộ chung cư',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'nhà riêng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'biệt thự, liền kề',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'mặt phố',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'nền dự án',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'đất',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'trang trại, khu nghỉ dưỡng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'condotel',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'kho, nhà xưởng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'bất động sản khác',
                'type' => '1',
                'status' => '1',
            ],
        ];

        foreach ($data as $v) {
            DB::table('category')->insert($v);
        }
    }
}

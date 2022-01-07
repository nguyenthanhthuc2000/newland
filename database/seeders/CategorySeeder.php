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
                'name' => 'Bán căn hộ chung cư',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán nhà riêng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán biệt thự, liền kề',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán mặt phố',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán nền dự án',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán đất',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán trang trại, khu nghỉ dưỡng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán condotel',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán kho, nhà xưởng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Bán bất động sản khác',
                'type' => '0',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê căn hộ chung cư',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê nhà riêng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê biệt thự, liền kề',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê mặt phố',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê nền dự án',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê đất',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê trang trại, khu nghỉ dưỡng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê condotel',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê kho, nhà xưởng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'name' => 'Cho thuê bất động sản khác',
                'type' => '1',
                'status' => '1',
            ],
        ];

        foreach ($data as $v) {
            DB::table('category')->insert($v);
        }
    }
}

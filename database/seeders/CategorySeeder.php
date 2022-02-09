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
                'id' => '1',
                'name' => 'Bán căn hộ chung cư',
                'slug' => 'ban-can-ho-chung-cu',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Bán nhà riêng',
                'slug' => 'ban-nha-rieng',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Bán biệt thự, liền kề',
                'slug' => 'ban-biet-thu-lien-ke',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Bán mặt phố',
                'slug' => 'ban-mat-pho',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '5',
                'name' => 'Bán nền dự án',
                'slug' => 'ban-nen-du-an',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '6',
                'name' => 'Bán đất',
                'slug' => 'ban-dat',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '7',
                'name' => 'Bán trang trại, khu nghỉ dưỡng',
                'slug' => 'ban-trang-trai-khu-nghi-duong',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '8',
                'name' => 'Bán condotel',
                'slug' => 'ban-condotel',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '9',
                'name' => 'Bán kho, nhà xưởng',
                'slug' => 'ban-kho-nha-xuong',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '10',
                'name' => 'Bán bất động sản khác',
                'slug' => 'ban-bat-dong-san-khac',
                'type' => '0',
                'status' => '1',
            ],
            [
                'id' => '11',
                'name' => 'Cho thuê căn hộ chung cư',
                'slug' => 'cho-thue-can-ho-chung-cu',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '12',
                'name' => 'Cho thuê nhà riêng',
                'slug' => 'cho-thue-nha-rieng',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '13',
                'name' => 'Cho thuê biệt thự, liền kề',
                'slug' => 'cho-thue-biet-thu-lien-ke',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '14',
                'name' => 'Cho thuê mặt phố',
                'slug' => 'cho-thue-mat-pho',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '15',
                'name' => 'Cho thuê nền dự án',
                'slug' => 'cho-thue-nen-du-an',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '16',
                'name' => 'Cho thuê đất',
                'slug' => 'cho-thue-dat',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '17',
                'name' => 'Cho thuê trang trại, khu nghỉ dưỡng',
                'slug' => 'cho-thue-trang-trai-khu-nghi-duong',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '18',
                'name' => 'Cho thuê condotel',
                'slug' => 'cho-thue-condotel',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '19',
                'name' => 'Cho thuê kho, nhà xưởng',
                   'slug' => 'ban-kho-nha-xuong',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '20',
                'name' => 'Cho thuê bất động sản khác',
                'slug' => 'ban-bat-dong-san-khac',
                'type' => '1',
                'status' => '1',
            ],
            [
                'id' => '21',
                'name' => 'Cho thuê phòng trọ',
                'slug' => 'cho-thue-phong-tro',
                'type' => '1',
                'status' => '1',
            ],
        ];

        foreach ($data as $v) {
            DB::table('category')->insert($v);
        }
    }
}

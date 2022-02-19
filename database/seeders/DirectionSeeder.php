<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'Đông',
            ],
            [
                'name' => 'Tây',
            ],
            [
                'name' => 'Nam',
            ],
            [
                'name' => 'Bắc',
            ],
            [
                'name' => 'Đông Bắc',
            ],
            [
                'name' => 'Tây Bắc',
            ],
            [
                'name' => 'Tây Nam',
            ],
            [
                'name' => 'Đông Nam',
            ]
        ];

        foreach($datas as $data){
            DB::table('direction')->insert($data);
        }
    }
}

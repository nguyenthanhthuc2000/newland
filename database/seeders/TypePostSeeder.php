<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePostSeeder extends Seeder
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
                'type' => 'nap-tien',
                'slug' => 'nap-tien',
                'code' => substr(md5(microtime()),rand(0,5), 7),
                'title' => 'Nạp tiền'
            ],
            [
                'type' => 'tai-khoan-cong-ty',
                'slug' => 'tai-khoan-cong-ty',
                'code' => substr(md5(microtime()),rand(0,5), 7),
                'title' => 'Tài khoản công ty'
            ],
            [
                'type' => 'tai-khoan-ca-nhan',
                'slug' => 'tai-khoan-ca-nhan',
                'code' => substr(md5(microtime()),rand(0,5), 7),
                'title' => 'Tài khoản cá nhân'
            ],
            [
                'type' => 'noi-quy-dang-bai',
                'slug' => 'noi-quy-dang-bai',
                'code' => substr(md5(microtime()),rand(0,5), 7),
                'title' => 'Nội quy đăng bài'
            ],
            [
                'type' => 'chinh-sach',
                'slug' => 'chinh-sach',
                'code' => substr(md5(microtime()),rand(0,5), 7),
                'title' => 'Chính sách'
            ],
            [
                'type' => 'quy-dinh',
                'slug' => 'quy-dinh',
                'code' => substr(md5(microtime()),rand(0,5), 7),
                'title' => 'Quy định'
            ]
        ];

        foreach($datas as $data){

            DB::table('posts')->insert($data);
        }
    }
}

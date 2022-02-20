<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id' => 1,
            'name' => 'Công ty cổ phần NewLand Việt Nam',
            'email' => 'hotro@newland.vn',
            'hotline_1' => '1900 1000',
            'hotline_2' => '1900 1001',
            'zalo' => '1900 1001',
            'logo' => 'logo.png',
            'logo_footer' => 'logo.png',
            'youtube' => 'https://www.youtube.com/',
            'facebook' => 'https://www.facebook.com/',
            'logan' => 'Uy tín - Chất lượng!',
            'address' => 'Tầng 31, Keangnam Hanoi Landmark, Phạm Hùng, Nam Từ Liêm, Hà Nội',
            'google_map' => 'Tầng 31, Keangnam Hanoi Landmark, Phạm Hùng, Nam Từ Liêm, Hà Nội',
            'domain' => 'newland.vn',
        ]);
    }
}

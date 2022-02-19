<?php
namespace App\Repository\Setting;

use App\Repository\BaseRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Setting();
    }
}

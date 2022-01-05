<?php
namespace App\Repository\Province;

use App\Repository\BaseRepository;
use App\Models\Province;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Province();
    }
}

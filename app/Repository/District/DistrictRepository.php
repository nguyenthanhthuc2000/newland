<?php
namespace App\Repository\District;

use App\Repository\BaseRepository;
use App\Models\District;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new District();
    }
}

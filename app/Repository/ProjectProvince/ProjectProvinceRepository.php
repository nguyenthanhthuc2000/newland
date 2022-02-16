<?php
namespace App\Repository\ProjectProvince;

use App\Repository\BaseRepository;
use App\Models\ProjectProvince;

class ProjectProvinceRepository extends BaseRepository implements ProjectProvinceRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new ProjectProvince();
    }
}

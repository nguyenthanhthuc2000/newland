<?php
namespace App\Repository\ProjectDistrict;

use App\Repository\BaseRepository;
use App\Models\ProjectDistrict;

class ProjectDistrictRepository extends BaseRepository implements ProjectDistrictRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new ProjectDistrict();
    }
}

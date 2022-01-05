<?php
namespace App\Repository\Ward;

use App\Repository\BaseRepository;
use App\Models\Ward;

class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Ward();
    }
}

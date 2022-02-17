<?php
namespace App\Repository\Direction;

use App\Repository\BaseRepository;
use App\Models\Direction;

class DirectionRepository extends BaseRepository implements DirectionRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Direction();
    }
}

<?php
namespace App\Repository\Street;

use App\Repository\BaseRepository;
use App\Models\Street;

class StreetRepository extends BaseRepository implements StreetRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Street();
    }
}

<?php
namespace App\Repository\Followers;

use App\Repository\BaseRepository;
use App\Models\Followers;

class FollowersRepository extends BaseRepository implements FollowersRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Followers();
    }
}

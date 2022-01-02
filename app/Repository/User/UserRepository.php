<?php
namespace App\Repository\User;

use App\Repository\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new User();
    }
}

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

    public function getUserByGoogleId($id){
        return $this->model->where('google_id', $id)->first();
    }

    public function getUserByFacebookId($id){
        return $this->model->where('facebook_id', $id)->first();
    }
}

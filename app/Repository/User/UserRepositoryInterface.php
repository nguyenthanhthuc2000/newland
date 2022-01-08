<?php
namespace App\Repository\User;

use App\Repository\RepositoryInterFace;

interface UserRepositoryInterface extends RepositoryInterFace
{
    public function getUserByGoogleId($id);

    public function getUserByFacebookId($id);


}

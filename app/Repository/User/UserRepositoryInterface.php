<?php
namespace App\Repository\User;

use App\Repository\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUserByGoogleId($id);

    public function getUserByFacebookId($id);


}

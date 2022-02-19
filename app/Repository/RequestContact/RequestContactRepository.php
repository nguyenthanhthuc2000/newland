<?php
namespace App\Repository\RequestContact;

use App\Repository\BaseRepository;
use App\Models\RequestContact;

class RequestContactRepository extends BaseRepository implements RequestContactRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new RequestContact();
    }
}

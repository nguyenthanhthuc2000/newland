<?php
namespace App\Repository\ProjectType;

use App\Repository\BaseRepository;
use App\Models\ProjectType;

class ProjectTypeRepository extends BaseRepository implements ProjectTypeRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new ProjectType();
    }
}

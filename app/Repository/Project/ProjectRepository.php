<?php
namespace App\Repository\Project;

use App\Repository\BaseRepository;
use App\Models\Project;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Project();
    }
}

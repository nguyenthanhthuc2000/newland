<?php
namespace App\Repository\ProjectWard;

use App\Repository\BaseRepository;
use App\Models\ProjectWard;

class ProjectWardRepository extends BaseRepository implements ProjectWardRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new ProjectWard();
    }
}

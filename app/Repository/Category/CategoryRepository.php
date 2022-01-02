<?php
namespace App\Repository\Category;

use App\Repository\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Category();
    }
}

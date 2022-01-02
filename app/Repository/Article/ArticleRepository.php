<?php
namespace App\Repository\Article;

use App\Repository\BaseRepository;
use App\Models\Article;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Article();
    }
}

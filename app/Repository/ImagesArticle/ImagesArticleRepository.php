<?php
namespace App\Repository\ImagesArticle;

use App\Repository\BaseRepository;
use App\Models\ImagesArticle;

class ImagesArticleRepository extends BaseRepository implements ImagesArticleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new ImagesArticle();
    }
}

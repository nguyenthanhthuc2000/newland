<?php
namespace App\Repository\Article;

use App\Repository\BaseRepository;
use App\Models\Article;
use App\Filters\ArticleFilter;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Article();
    }

    // public function getArticleByPrice($from, $to){
    //     return $this->model->filter($from, $to)->get();
    // }
}

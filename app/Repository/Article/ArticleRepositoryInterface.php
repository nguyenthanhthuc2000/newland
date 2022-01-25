<?php
namespace App\Repository\Article;
use App\Repository\RepositoryInterFace;

interface ArticleRepositoryInterface extends RepositoryInterFace
{
     public function getByStatus($status);
}

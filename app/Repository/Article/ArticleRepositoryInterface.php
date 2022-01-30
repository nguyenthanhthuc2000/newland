<?php
namespace App\Repository\Article;
use App\Repository\RepositoryInterface;

interface ArticleRepositoryInterface extends RepositoryInterface
{
     public function getByStatus($status);

}

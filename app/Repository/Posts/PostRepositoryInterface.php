<?php
namespace App\Repository\Posts;
use App\Repository\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getAllNews();

    public function getByType($type);
}

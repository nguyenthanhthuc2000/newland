<?php

namespace App\Http\Controllers;

use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $userRepo;
    protected $articleRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        ArticleRepositoryInterface $articleRepo
    ){
        $this->userRepo = $userRepo;
        $this->articleRepo = $articleRepo;
    }
}

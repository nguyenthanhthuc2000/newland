<?php

namespace App\Http\Controllers;

use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    protected $userRepo;
    public function __construct(
        UserRepositoryInterface $userRepo
    ){
        $this->userRepo = $userRepo;
    }

}

<?php

namespace App\Http\Controllers;

use App\Repository\Followers\FollowersRepositoryInterface;
use http\Client\Response;
use Illuminate\Http\Request;

class Followers extends Controller
{
    protected $followerRepo;

    public function __construct(
        FollowersRepositoryInterface $followerRepo

    )
    {
        $this->followerRepo = $followerRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $followers = $this->followerRepo->getAll();
        return view('admin.pages.customer.followers', compact('followers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow(Request $request){
        $data = [
            'email' => $request->email
        ];
        if($this->followerRepo->create($data)){
            return response()->json([ 'status'=> 200]);
        }
        return response()->json([ 'status'=> 500]);
    }

}

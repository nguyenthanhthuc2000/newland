<?php

namespace App\Http\Controllers;

use App\Repository\Followers\FollowersRepositoryInterface;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:65',
                'regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
            ]
        ]);
        if($validator->fails()){
            return response()->json([
                'validation_errors' => $validator->messages()
            ]);
        }
        else {
            $data = [
                'email' => $request->email
            ];
    
            if($this->followerRepo->create($data)){
                return response()->json([ 'status'=> 200, 'message' => 'Đăng kí thành công!']);
            }
            return response()->json([ 'status'=> 500, 'message' => 'Lỗi, vui lòng thử lại!']);
        }
       
    }

}

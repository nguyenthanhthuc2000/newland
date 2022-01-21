<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\RequestContact\RequestContactRepositoryInterface;


class RequestContactController extends Controller
{
    protected $requestContactRepo;

    public function __construct(
        RequestContactRepositoryInterface $requestContactRepo

    )
    {
        $this->requestContactRepo = $requestContactRepo;
    }

    public function store(Request $request){
        $this->validate($request,
            [
                "name" => "required|max:32",
                "phone" => "required|max:12",
            ]
        );
        if($request->email){
            $this->validate($request,
                [
                    "email" => "required|email:rfc,dns|max:65",
                ]
            );
        }

        $arrayData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'content' => $request->contents,
            'article_id' => $request->article_id,
        ];

        if($this->requestContactRepo->create($arrayData)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }
}

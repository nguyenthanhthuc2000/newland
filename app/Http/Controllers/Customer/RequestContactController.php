<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\RequestContact\RequestContactRepositoryInterface;
use Illuminate\Support\Facades\Validator;


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
        
        $validator = Validator::make($request->all(), 
            [
                "name" => "required|max:35",
                "phone" => [
                    'required',
                    'regex:/^((\+)33|0)[1-9](\d{2}){4}$/'
                ],
                "content" => "required|max:255",
                "article_id" => 'required|exists:App\Models\Article,id',
                'email' => [
                    'max:65',
                    'required',
                    'regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
                ],
            ],
            [
                '*.required' => 'Không được bỏ trống',
                '*.regex' => 'Không đúng định dạng',
                '*.exists' => 'Không đúng',
                'name.max' => 'Không nhập quá 35 kí tự',
                'email.max' => 'Không nhập quá 65 kí tự',
                'content.max' => 'Không nhập quá 255 kí tự'
            ]
        );

        if($validator->fails()){
            return response()->json($validator->messages(), 422);
        }

        try {
            $arrayData = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'content' => $request->contents,
                'article_id' => $request->article_id,
            ];
            if($this->requestContactRepo->create($arrayData)){
                return response()->json(
                    [
                        'message' => 'Yêu cầu liên hệ thành công!'
                    ]
                );
            }
        }
        catch (\Exception $exception) {

            return response()->json(
                [
                    'message' => 'Lỗi hệ thống vui lòng thử lại sau!'
                ]
                ,500
            );
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function postRegister(Request $request){
        $data = $request->all();

        $attributes = [
            'email' => $data['email'],
            'password' => $data['password'],
            'name' => $data['email'],
            'birthday' => $data['birthday'],
            'province' => $data['province'],
            'phone' => $data['phone'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'card_id' => $data['card_id'],
            'sex' => $data['sex'],
        ];

        $query = $this->userRepo->create($attributes);
        if($query){
            return response()->json(['message' => 'Đăng kí thành công, vui lòng xác nhận email để đăng nhập!'], 200);
        }
    }
}

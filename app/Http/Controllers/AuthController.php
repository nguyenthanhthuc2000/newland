<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{

    public function getRegister(){
        $data = [
            'province' => Controller::getProvince(),
        ];
        return view('auth.register', $data);
    }


    public function postRegister(Request $request){
        $data = $request->all();

        $attributes = [
            'email' => $data['email'],
            'password' => $data['password'],
            'name' => $data['name'],
            'birthday' => $data['birthday'],
            'province_id' => 1,
            'phone' => $data['phone'],
            'district_id' => 1,
            'ward_id' => 1,
            'card_id' => $data['card_id'],
            'sex' => $data['sex'],
        ];


        $query = $this->userRepo->create($attributes);
        if($query){
            return response()->json(['message' => 'Thành công !', 'status' => 200]);
        }
        else{
            return response()->json(['message' => 'Vui lòng thử lại sau!', 'status' => 500]);
        }
    }
}

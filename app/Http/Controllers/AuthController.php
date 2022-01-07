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
        dd($data);
        $this->validate( $request,
            [
                'email' => 'required',
                'password' => 'required',
                'name' => 'required',
                'birthday' => 'required',
                'phone' => 'required',
                'province_id' => 1,
                'district_id' => 1,
                'ward_id' => 1,
                'card_id' => 'required',
                'sex' => 'required',
            ],
            [
                'email.required' => 'Email không được để trống',
                'password.required' => 'Tiêu đề không được để trống',
                'password.required' => 'Tiêu đề không được để trống',
                'name.required' => 'Tiêu đề không được để trống',
                'birthday.required' => 'Tiêu đề không được để trống',
                'phone.required' => 'Tiêu đề không được để trống',
                'province_id.required' => 'Tiêu đề không được để trống',
                'district_id.required' => 'Tiêu đề không được để trống',
                'ward_id.required' => 'Tiêu đề không được để trống',
                'card_id.required' => 'Tiêu đề không được để trống',
                'sex.required' => 'Tiêu đề không được để trống',
            ]
        );

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

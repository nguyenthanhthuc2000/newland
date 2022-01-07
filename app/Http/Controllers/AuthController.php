<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function getRegister(){
        $data = [
            'province' => Controller::getProvince(),
        ];
        return view('auth.register', $data);
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function getLogout(Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect()->route('auth.get.login');

    }

    public function postLogin(Request $request){
        $this->validate( $request,
            [
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'phone.required' => 'Vui lòng nhập sdt đăng nhập',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('home.index');
        }
        else{
            return back()->with([
                'errorLogin' => 'Tài khoản hoặc mật khẩu không chính xác!',
            ]);
        }
    }

    public function postRegister(Request $request){
        $this->validate( $request,
            [
                "email" => [
                    "required",
                    "unique:App\Models\User,email"
                ],
                'password' => 'required',
                'name' => 'required',
                'password_confirm' => 'required|same:password',
                'birthday' => 'required',
                "phone" => [
                    "required",
                    "unique:App\Models\User,phone"
                ],
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
                "card_id" => [
                    "required",
                    "unique:App\Models\User,card_id"
                ],
                'sex' => 'required',
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.unique' => 'Email đã tồn tại trên hệ thống',
                'password.required' => 'Mật khẩu không được để trống',
                'password_confirm.required' => 'Mật khẩu xác nhận không để trống',
                'password_confirm.same' => 'Mật khẩu xác nhận không đúng',
                'name.required' => 'Họ và tên không để trống',
                'birthday.required' => 'Ngày sinh không để trống',
                'phone.required' => 'Số điện thoại không để trống',
                'phone.unique' => 'Số điện thoại đã tồn tại trên hệ thống',
                'province.required' => 'Tỉnh/Tp không để trống',
                'district.required' => 'Quận/huyện không để trống',
                'ward.required' => 'Phường xã không để trống',
                'card_id.required' => 'CMND/CCCD không để trống',
                'card_id.unique' => 'CMND/CCCD đã tồn tại trên hệ thống',
                'sex.required' => 'Giới tính không để trống',
            ]
        );

        $data = $request->all();

        $attributes = [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'birthday' => $data['birthday'],
            'phone' => $data['phone'],
            'province_id' => $data['province'],
            'district_id' => $data['district'],
            'ward_id' => $data['ward'],
            'card_id' => $data['card_id'],
            'sex' => $data['sex'],
        ];

        $query = $this->userRepo->create($attributes);
        if($query){
            return redirect()->route('auth.get.login')->with('registerSuccess', 'Đăng kí thành công, vui lòng đăng nhập để sử dụng!');
        }
        else{
            return back()->with('registerError', 'Lỗi, vui lòng thử lại sau!');
        }
    }
}

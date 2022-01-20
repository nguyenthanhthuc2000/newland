<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class AuthController extends Controller
{
    public function loginFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook(){
        $userByFacebook = Socialite::driver('facebook')->stateless()->user();
        $id = $userByFacebook['id'];

        $user = $this->userRepo->getUserByFacebookId($id);
        if($user){
            Auth::login($user);
            return redirect()->route('home.index');
        }
        else{
            $array = [
                'email' => $userByFacebook['email'],
                'name' => $userByFacebook['name'],
                'facebook_id' => $userByFacebook['id'],
                'sex' => 1,
            ];
            $newUser = $this->userRepo->create($array);
            if($newUser){
                Auth::login($newUser);
                return redirect()->route('home.index');
            }
            else{
                return redirect()->route('auth.get.login')->with([
                    'errorLogin' => 'Vui lòng thử lại sau!',
                ]);
            }
        }
    }

    /**
     * Login google
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginGoogle(){
        return Socialite::driver('google')->redirect();
    }

    /**
     * Login google
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callbackGoogle(){
        $userByGoogle = Socialite::driver('google')->stateless()->user();
        $id = $userByGoogle['id'];

        $user = $this->userRepo->getUserByGoogleId($id);
        if($user){
            Auth::login($user);
            return redirect()->route('home.index');
        }
        else{
            $array = [
                'email' => $userByGoogle['email'],
                'name' => $userByGoogle['name'],
                'google_id' => $userByGoogle['id'],
                'sex' => 1,
            ];
            $newUser = $this->userRepo->create($array);
            if($newUser){
                Auth::login($newUser);
                return redirect()->route('home.index');
            }
            else{
                return redirect()->route('auth.get.login')->with([
                    'errorLogin' => 'Vui lòng thử lại sau!',
                ]);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePassword(Request $request){
        $this->validate( $request,
            [
                'password_old' => 'required',
                'password_new' => 'required',
                'password_confirm' => 'required|same:password_new',
            ],
            [
                'password_old.required' => 'Mật khẩu cũ không được để trống',
                'password_new.required' => 'Mật khẩu mới không được để trống',
                'password_confirm.required' => 'Mật khẩu xác nhận không để trống',
                'password_confirm.same' => 'Mật khẩu xác nhận không đúng',
            ]
        );
        if (Hash::check($request->password_old, Auth::user()->password))
        {
            $arr = array(
                'password' => Hash::make($request->password_new)
            );
            $update = $this->userRepo->update(Auth::id(), $arr);
            if($update){
                $request->session()->flush();
                Auth::logout();
                return redirect()->route('auth.get.login')->with('updatePasswordSuccess', 'Đổi mật khẩu thành công, vui lòng đăng nhập lại!');
            }
            return back()->with('updatePasswordError', 'Lỗi, vui lòng thử lại!');
        }
        return back()->with('updatePasswordError', 'Sai mật khẩu hiện tại!');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function changePassword(){
        return view('auth.change_password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postUpdate(Request $request){
        $data = $request->all();

        if(Auth::user()->google_id != null){
            $this->validate( $request,
                [
                    "phone" => [
                        'required',
                        'digits_between:10,12',
                    ],
                    'name' => 'required',
                    'birthday' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'ward' => 'required',
                    "card_id" => [
                        "required",
                    ],
                    'sex' => 'required',
                ],
                [
                    'phone.required' => 'Số điện không được để trống',
                    'phone.digits_between' =>  'Số điện thoại từ 10-12 số!',
                    'name.required' => 'Họ và tên không để trống',
                    'birthday.required' => 'Ngày sinh không để trống',
                    'province.required' => 'Tỉnh/Tp không để trống',
                    'district.required' => 'Quận/huyện không để trống',
                    'ward.required' => 'Phường xã không để trống',
                    'card_id.required' => 'CMND/CCCD không để trống',
                    'sex.required' => 'Giới tính không để trống',
                ]
            );

            $attributes = [
                'phone' => $data['phone'],
                'name' => $data['name'],
                'birthday' => $data['birthday'],
                'province_id' => $data['province'],
                'district_id' => $data['district'],
                'ward_id' => $data['ward'],
                'card_id' => $data['card_id'],
                'sex' => $data['sex'],
            ];
        }
        else{
            $this->validate( $request,
                [
                    "email" => [
                        "required",
                        "email:rfc,dns",
                        "digits_between:6,65"
                    ],
                    'name' => 'required',
                    'birthday' => 'required',
                    'province' => 'required',
                    'district' => 'required',
                    'ward' => 'required',
                    "card_id" => [
                        "required",
                    ],
                    'sex' => 'required',
                ],
                [
                    'email.required' => 'Email không được để trống',
                    'email.email' => 'Sai định dạng email',
                    'email.digits_between' => 'Sai định dạng email',
                    'name.required' => 'Họ và tên không để trống',
                    'birthday.required' => 'Ngày sinh không để trống',
                    'province.required' => 'Tỉnh/Tp không để trống',
                    'district.required' => 'Quận/huyện không để trống',
                    'ward.required' => 'Phường xã không để trống',
                    'card_id.required' => 'CMND/CCCD không để trống',
                    'sex.required' => 'Giới tính không để trống',
                ]
            );
            $attributes = [
                'email' => $data['email'],
                'name' => $data['name'],
                'birthday' => $data['birthday'],
                'province_id' => $data['province'],
                'district_id' => $data['district'],
                'ward_id' => $data['ward'],
                'card_id' => $data['card_id'],
                'sex' => $data['sex'],
            ];
        }


        $query = $this->userRepo->update(Auth::id(), $attributes);
        if($query){
            return back()->with('updateSuccess', 'Cập nhật thành công!');
        }
        else{
            return back()->with('updateError', 'Lỗi, vui lòng thử lại sau!');
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function info(){
        $data = [
            'province' => Controller::getProvince(),
            'info' => $this->userRepo->find(Auth::id())
        ];
        return view('auth.info', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getRegister(){
        $data = [
            'province' => Controller::getProvince(),
        ];
        return view('auth.register', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getLogin(Request $request){
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout(Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect()->route('auth.get.login');

    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
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
            $ip = $this->getIp();
            if($ip){
                $array = ['last_ip_login' => $ip];
                $this->userRepo->update(Auth::id(), $array);
            }
            return redirect()->route('home.index');
        }
        else{
            return back()->with([
                'errorLogin' => 'Tài khoản hoặc mật khẩu không chính xác!',
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postRegister(Request $request){
        $this->validate( $request,
            [
                "email" => [
                    "required",
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

    public function personalArticle() {
        $personalArticle = $this->artRepo->getByAttributes(['user_id' => Auth::id()]);
        $data = [
            'personalArticle' => $personalArticle
        ];
        return view('auth.personal_article', $data);
    }
}

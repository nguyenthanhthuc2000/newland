<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $articles = $this->artRepo->getByStatus([0]);
        $data = [
            'articles' => $articles,
        ];
        return view('admin.pages.index', $data);
    }

    public function updateSetting(Request $request){
        $this->validate($request,
            [
                'name' => ['required', 'max:50'],
                'address' => ['required', 'max:254'],
                'hotline_1' => ['required', 'numeric', 'digits_between:8,12'],
                'hotline_2' => ['required', 'numeric', 'digits_between:8,12'],
                'email' => ['required', 'email:rfc,dns', 'max:65'],
                'zalo' => ['required', 'numeric', 'digits_between:8,12'],
                'facebook' => ['required'],
                'youtube' => ['required'],
                'google_map' => ['required']
            ],
            [
                '*.required' => 'Vui lòng không bỏ trống',
                '*.digits_between' =>  'Định dạng 8 -12 số',
                '*.numeric' =>  'Sai định dạng số',
                'name.max' =>  'Tối đa 50 kí tự',
                'address.max' =>  'Tối đa 254 kí tự',
                'email.email' =>  'Không đúng định dạng email'
            ],
        );
        $arrayData = [
            'name' => $request->name,
            'address' => $request->address,
            'hotline_1' => $request->hotline_1,
            'hotline_2' => $request->hotline_2,
            'email' => $request->email,
            'zalo' => $request->zalo,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'google_map' => $request->google_map,
        ];
        if($request->logo){
            $this->validate($request,
                [
                    'logo' => ['mimes:jpg,png'],
                ],
                [
                    'logo.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                ],
            );
                $image = substr(md5(microtime()),rand(0,5), 6).'-logo.'.$request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->move('uploads/setting/', $image);
                $arrayData = $arrayData + array('logo' => $image);
        }
        if($request->logo_footer){
            $this->validate($request,
                [
                    'logo_footer' => ['mimes:jpg,png'],

                ],
                [
                    'logo_footer.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                ],
            );
            $image = substr(md5(microtime()),rand(0,5), 6).'-logo-footer.'.$request->file('logo_footer')->getClientOriginalExtension();
            $request->file('logo_footer')->move('uploads/setting/', $image);
            $arrayData = $arrayData + array('logo_footer' => $image);
        }

        if($this->settingRepo->update(1, $arrayData)){
            return redirect()->route('admin.setting')->with('success', 'Cập nhật thành công!');
        }
        return redirect()->route('admin.setting')->with('error', 'Thử lại sau!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function setting(){
        $settingsWeb = $this->settingRepo->find(1);
        return view('admin.pages.setting.website', compact('settingsWeb'));
    }

}

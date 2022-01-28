<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class DashboardController extends Controller
{
    public function updateStatusSlider(Request $request){
        $attributes = [
            'status' => $request->status
        ];
        if($this->imgArtRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroySlider(Request $request){
        if($this->imgArtRepo->delete($request->id)) {
            return response()->json(['messages' => 'Xóa thành công', 'status' => 200]);
        }
        return response()->json(['messages' => 'Lỗi, thử lại sau', 'status' => 500]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSlider(Request $request, $id){
        $this->validate($request,
            [
                'image' => ['mimes:jpg,png'],
            ],
            [
                'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
            ],
        );
        $attributes = [
            'type' => 'slider',
            'id' => $id
        ];
        $slider = $this->imgArtRepo->findByAttributes($attributes);
        if($slider){
            //xóa hình cũ
            if (File::exists(public_path() . "/uploads/slider/" . $slider->image)) {
                File::delete(public_path() . "/uploads/slider/" . $slider->image);
            }
            $image = substr(md5(microtime()),rand(0,5), 10).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/slider/', $image);

            $arrayData = [
                'description_img' => $request->description_img,
                'link' => $request->link,
                'image' => $image,
                'type' => 'slider'
            ];
            if($this->imgArtRepo->update($id, $arrayData)){
                return redirect()->route('admin.sliders')->with('success', 'Cập nhật thành công');
            }
            return redirect()->route('admin.sliders')->with('error', 'Cập nhật thất bại, thử lại sau');
        }
        return redirect()->route('admin.sliders')->with('error', 'Không tìm thấy slider');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function editSlider($id){
        $attributes = [
            'type' => 'slider',
            'id' => $id
        ];
        $slider = $this->imgArtRepo->findByAttributes($attributes);
        if($slider){
            $route = "admin.update.slider";
            return view('admin.pages.setting.form_image', compact('route', 'id', 'slider'));
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeSlider(Request $request){
        $this->validate($request,
            [
                'image' => ['mimes:jpg,png'],
            ],
            [
                'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
            ],
        );
        $image = substr(md5(microtime()),rand(0,5), 10).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/slider/', $image);

        $arrayData = [
            'description_img' => $request->description_img,
            'link' => $request->link,
            'image' => $image,
            'type' => 'slider'
        ];

        if($this->imgArtRepo->create($arrayData)){
            return redirect()->route('admin.sliders')->with('success', 'Thêm mới thành công');
        }
        return redirect()->route('admin.sliders')->with('error', 'Thêm mới thất bại, thử lại sau');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createSlider(){
        $slider = null;
        $id = '';
        $route = "admin.store.slider";
        return view('admin.pages.setting.form_image', compact('route', 'id', 'slider'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listSlider(){
        $attributes = [
            'type' => 'slider'
        ];
        $sliders = $this->imgArtRepo->getByAttributesAll($attributes);
        return view('admin.pages.setting.slider', compact('sliders'));
    }

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSetting(Request $request){
        $this->validate($request,
            [
                'name' => ['required', 'max:50'],
                'address' => ['required', 'max:254'],
                'hotline_1' => ['required', 'numeric', 'digits_between:8,12'],
                'hotline_2' => ['required', 'numeric', 'digits_between:8,12'],
                'email' => ['required', 'email:rfc,dns', 'max:65'],
                'zalo' => ['required'],
                'facebook' => ['required'],
                'youtube' => ['required'],
                'google_map' => ['required'],
                'domain' => ['required', 'max:50']
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
            'domain' => $request->domain,
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

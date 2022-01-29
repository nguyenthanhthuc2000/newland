<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class DashboardController extends Controller
{

    public function listBanner(){
        $attributes = [
            'type' => 'banner'
        ];
        $titlePage = 'Banner';
        $routeCreate = 'admin.create.banner';
        $images = $this->imgArtRepo->getByAttributesAll($attributes);
        return view('admin.pages.setting.list_image', compact('images', 'titlePage', 'routeCreate'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
        $img = $this->find($request->id);
        if($img){
            //xóa hình cũ
            if (File::exists(public_path() . "/uploads/slider/" . $img->image)) {
                File::delete(public_path() . "/uploads/slider/" . $img->image);
            }
            if($this->imgArtRepo->delete($request->id)) {
                return response()->json(['messages' => 'Xóa thành công', 'status' => 200]);
            }
            return response()->json(['messages' => 'Lỗi, thử lại sau', 'status' => 500]);
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
            'id' => $id
        ];
        $imageUpdate = $this->imgArtRepo->findByAttributes($attributes);
        if($imageUpdate){
            $arrayData = [
                'description_img' => $request->description_img,
                'link' => $request->link,
            ];

            if($request->image){
                //xóa hình cũ
                if (File::exists(public_path() . "/uploads/slider/" . $imageUpdate->image)) {
                    File::delete(public_path() . "/uploads/slider/" . $imageUpdate->image);
                }
                $image = substr(md5(microtime()),rand(0,5), 10).'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('uploads/slider/', $image);
                $arrayData = $arrayData + array('image' => $image);
            }

            if($this->imgArtRepo->update($id, $arrayData)){
                if($imageUpdate->type == 'slider')
                {
                    return redirect()->route('admin.sliders')->with('success', 'Cập nhật thành công');
                }
                return redirect()->route('admin.banners')->with('success', 'Cập nhật thành công');
            }

            if($imageUpdate->type == 'slider')
            {
                return redirect()->route('admin.sliders')->with('error', 'Cập nhật thất bại, thử lại sau');
            }
            return redirect()->route('admin.banners')->with('error', 'Cập nhật thất bại, thử lại sau');
        }

        if($imageUpdate->type == 'slider')
        {
            return redirect()->route('admin.sliders')->with('error', 'Không tìm thấy slider');
        }
        return redirect()->route('admin.banners')->with('error', 'Không tìm thấy slider');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function editSlider($id){
        $attributes = [
            'id' => $id
        ];
        $image = $this->imgArtRepo->findByAttributes($attributes);
        $type = $image->type;
        if($image){
            $route = "admin.update.slider";
            return view('admin.pages.setting.form_image', compact('route', 'id', 'image', 'type'));
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
                'image' => ['mimes:jpg,png', 'required'],
            ],
            [
                'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                'image.required' => 'Chưa chọn ảnh',
            ],
        );
        $image = substr(md5(microtime()),rand(0,5), 10).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('uploads/slider/', $image);

        $arrayData = [
            'description_img' => $request->description_img,
            'link' => $request->link,
            'image' => $image,
            'type' => $request->type
        ];

        if($this->imgArtRepo->create($arrayData)){
            if($request->type == 'slider'){
                return redirect()->route('admin.sliders')->with('success', 'Thêm mới thành công');
            }
            return redirect()->route('admin.banners')->with('success', 'Thêm mới thành công');

        }
        if($request->type == 'slider'){
            return redirect()->route('admin.sliders')->with('error', 'Thêm mới thất bại, thử lại sau');
        }
        return redirect()->route('admin.banners')->with('error', 'Thêm mới thất bại, thử lại sau');


    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createSlider(){

        $image = null;
        $id = '';
        $route = "admin.store.slider";
        $type = 'slider';
        return view('admin.pages.setting.form_image', compact('route', 'id', 'image', 'type'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createBanner(){
        $image = null;
        $id = '';
        $route = "admin.store.slider";
        $type = 'banner';
        return view('admin.pages.setting.form_image', compact('route', 'id', 'image', 'type'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listSlider(){
        $attributes = [
            'type' => 'slider'
        ];
        $titlePage = 'Slider';
        $routeCreate = 'admin.create.slider';
        $images = $this->imgArtRepo->getByAttributesAll($attributes);
        return view('admin.pages.setting.list_image', compact('images', 'titlePage', 'routeCreate'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $attributes = [
            'level' => 0
        ];
        $data = [
            'articles' => $this->artRepo->getByStatus([0]),
            'allArticle' =>  $this->artRepo->getAllItem(),
            'allCustomer' =>  $this->userRepo->getByAttributesAll($attributes)
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

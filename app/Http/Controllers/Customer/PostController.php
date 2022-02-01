<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Str;
use File;
class PostController extends Controller
{


    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = $this->dirRepo->getOrDerBy()->reverse();
        $data = [
            'province' => Controller::getProvince(),
            'direction' => $direction
        ];
        return view('pages.post.post', $data);
    }

    public function getCategory(Request $request){
        $cat = $this->catRepo->getByAttributesAll(['type' => $request->type])->reverse();
        return  view('pages.post.component._category', ['cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                "form" => "required", //bán/thuê
                "category_id" => "required", //Loại bất động sản
                "province_id" => "required",// tỉnh Thành phố
                "district_id" => "required",// qquận huyện
                "ward_id" => "required",//Phường / Xã
                "street_id" => "required",//đường
                "address_on_post" => "required",//địa chủ trên bài đăng
                "title" => "required",// tiêu đề trên bài viết
                "sub_title" => "required",// mô tả ngắn
                "contents" => "required",//mô tả chi tiết
                "acreage" => "required",//diện tích
                "price" => "sometimes|required",//giá
                "unit" => "required",//dơn vị giá
                "legal_documents" => "required",//giấy tờ pháp lí
                "name_contact" => "required",
                "phone_contact" => "required",
                "address_contact" => "required",
                "email_contact" => "required",
            ],
            [
                "district_id.required" => "Vui lòng chọn Quận / Huyện",
                "ward_id.required" => "Vui lòng chọn Phường / Xã",
                "province_id.required" => "Vui lòng chọn Tỉnh / Thành phố",
                "unit.required" => "Vui lòng chọn Đơn vị",
                "category_id.required" => "Vui lòng chọn Loại bất động sản",
            ]
        );
        $dateForCode = new DateTime();
        $dateCodeStr = $dateForCode->format('dmyH');
        $private_code = 'PC'.$dateCodeStr;
        $slug = createSlug($request->title.'-'.$private_code);

        $attributes = [
            "form" => $request->form,
            "category_id" => $request->category_id,
            "private_code" => $private_code,
            "province_id" => $request->province_id,
            "district_id" => $request->district_id,
            "ward_id" => $request->ward_id,
            "street_id" => $request->street_id,
            "address_on_post" => $request->address_on_post,
            "title" => $request->title,
            "slug" => $slug,
            "sub_title" => $request->sub_title,
            "content" => $request->contents,
            "acreage" => $request->acreage,
            "price" => $request->price,
            "unit" => $request->unit,
            "legal_documents" => $request->legal_documents,
            "bedroom" => $request->bedroom,
            "toilet" => $request->toilet,
            "floor" => $request->floor,
            "house_direction" => $request->house_direction,
            "balcony_direction" => $request->balcony_direction,
            "way" => $request->way,
            "facade" => $request->facade,
            "furniture" => $request->furniture,
            "name_contact" => $request->name_contact,
            "phone_contact" => implode(',',$request->all()['phone_contact']),
            "address_contact" => $request->address_contact,
            "email_contact" => $request->email_contact,
            "user_id" => Auth::id(),
        ];

        $idCreated = $this->artRepo->create($attributes)->id;

        if($request->file('image') && $idCreated){
            $imgArr = $request->file('image');
            $description_img = $request->description_img;
            $date = new DateTime();
            $dateStr = $date->format('Y_m_d_H_i_s');

            for($i = 0; $i < count($imgArr); $i++){
                $extensionImage = $imgArr[$i]->clientExtension();
                $fileName = Str::random(35);
                $newFileName = $dateStr.'_'.$fileName.'.'.$extensionImage;

                $this->imgArtRepo->create([
                    'article_id'=> $idCreated,
                    'image' => $newFileName,
                    'description_img' => $description_img[$i]
                ]);

                $imgArr[$i]->move('uploads/article', $newFileName);
            };

        }
        return back()->with(['msg' => 'Đã thêm thành công', 'status' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function detail($slug){
        $detailArticle = $this->artRepo->getItemsBySlug($slug);
        if(!$detailArticle){
            return abort('404');
        }
        $userId = $detailArticle->user->id;
        $countArticleOfUser = $this->artRepo->getByAttributesAll(["user_id" => $userId])->count();
        $data = [
            'detailArticle' => $detailArticle,
            'countArticleOfUser' => $countArticleOfUser
        ];
        if($detailArticle->status != 1){
            if(Auth::check()){
                if(Auth::user()->level == 2 || $detailArticle->user_id == Auth::id()){
                    return view('pages.post.detail_post', $data);
                }
                return redirect()->route('home.index');
            }
            return redirect()->route('home.index');
        }
        return view('pages.post.detail_post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->artRepo->find($id);
        $direction = $this->dirRepo->getOrDerBy()->reverse();
        $cat = $this->catRepo->getByAttributesAll(['type' => 0])->reverse();
        $data = [
            // 'province' => $this->provinceRepo->find($article->province_id),
            'districts' => $this->districtRepo->find($article->province_id)->get(),
            'wards' => $this->wardRepo->find($article->district_id)->get(),
            'cat' => $cat,
            'direction' => $direction,
            'article' => $article
        ];
        return view('pages.post.post', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                "form" => "required", //bán/thuê
                "category_id" => "required|numeric", //Loại bất động sản
                "province_id" => "required|numeric",// tỉnh Thành phố
                "district_id" => "required|numeric",// qquận huyện
                "ward_id" => "required|numeric",//Phường / Xã
                "street_id" => "required",//đường
                "address_on_post" => "required",//địa chủ trên bài đăng
                "title" => "required",// tiêu đề trên bài viết
                "sub_title" => "required",// mô tả ngắn
                "contents" => "required",//mô tả chi tiết
                "acreage" => "required",//diện tích
                "price" => "sometimes|required",//giá
                "unit" => "required",//dơn vị giá
                "legal_documents" => "required",//giấy tờ pháp lí
                "name_contact" => "required",
                // "phone_contact" => "required",
                "address_contact" => "required",
                "email_contact" => "required",
            ],
            [
                "district_id.required" => "Vui lòng chọn Quận / Huyện",
                "ward_id.required" => "Vui lòng chọn Phường / Xã",
                "province_id.required" => "Vui lòng chọn Tỉnh / Thành phố",
                "unit.required" => "Vui lòng chọn Đơn vị",
                "category_id.required" => "Vui lòng chọn Loại bất động sản",
                "*.numeric" => "Vui lòng chọn Loại bất động sản",
            ]
        );
        $private_code = $this->artRepo->find($id)->private_code;
        $slug = createSlug($request->title.'-'.$private_code);
        $attributes = [
            "form" => $request->form,
            "category_id" => $request->category_id,
            "province_id" => $request->province_id,
            "district_id" => $request->district_id,
            "ward_id" => $request->ward_id,
            "street_id" => $request->street_id,
            "address_on_post" => $request->address_on_post,
            "title" => $request->title,
            "slug" => $slug,
            "sub_title" => $request->sub_title,
            "content" => $request->contents,
            "acreage" => $request->acreage,
            "price" => $request->price,
            "unit" => $request->unit,
            "legal_documents" => $request->legal_documents,
            "bedroom" => $request->bedroom,
            "toilet" => $request->toilet,
            "floor" => $request->floor,
            "house_direction" => $request->house_direction,
            "balcony_direction" => $request->balcony_direction,
            "way" => $request->way,
            "facade" => $request->facade,
            "furniture" => $request->furniture,
            "name_contact" => $request->name_contact,
            "phone_contact" => implode(',',$request->all()['phone_contact']),
            "address_contact" => $request->address_contact,
            "email_contact" => $request->email_contact,
            "user_id" => Auth::id(),
            "status" => 0,
            "state" => 0
        ];

        $updated = $this->artRepo->update($id, $attributes);
        if($updated){
            $old_images = $request->old_images;
            if($old_images){
                $get_old_images = $this->artRepo->find($id)->imagesArticle;
                if($get_old_images){
                    foreach($get_old_images as $img){
                        if(!in_array($img->id, $old_images)){
                            $img_name = $get_old_images->find($img->id)->image;
                            $img_path = public_path() .'uploads/article/' . $img_name;
                            if(File::exists($img_path)){
                                File::delete($img_path);
                            }
                            $img->delete($img->id);
                        }
                    }
                }
            }
            else if(!$old_images){
                $get_images = $this->artRepo->find($id)->imagesArticle;
                if($get_images->count() > 0){
                    $img_name = $get_images->find($id)->image;
                    $img_path = public_path() .'uploads/article/' . $img_name;
                    if(File::exists($img_path)){
                        File::delete($img_path);
                    }
                    $article->imagesArticle->where('article_id', $id)->each->delete();
                }
            }
            if($request->file('image')){
                $imgArr = $request->file('image');
                $description_img = $request->description_img;
                $date = new DateTime();
                $dateStr = $date->format('Y_m_d_H_i_s');

                for($i = 0; $i < count($imgArr); $i++){

                    $extensionImage = $imgArr[$i]->clientExtension();
                    $fileName = Str::random(35);
                    $newFileName = $dateStr.'_'.$fileName.'.'.$extensionImage;

                    $this->imgArtRepo->create([
                        'article_id'=> $id,
                        'image' => $newFileName,
                        'description_img' => $description_img[$i]
                    ]);

                    $imgArr[$i]->move('uploads/article', $newFileName);
                };

            }
        }

        return back()->with(['msg' => 'Chỉnh sửa thành công', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->artRepo->find($id)->first();
        if($article){
            $get_images = $article->imagesArticle;
            if($get_images->count() > 0){
                foreach($get_images as $image){
                    $img_name = $image->image;
                    $img_path = public_path() .'uploads/article/' . $img_name;
                    if(File::exists($img_path)){
                        File::delete($img_path);
                    }
                }
                $article->imagesArticle->where('article_id', $id)->each->delete();
            }
            $this->artRepo->delete($id);
            return back()->with(['msg' => 'Đã xóa thành công', 'status' => 'success']);
        }
        return back()->with(['msg' => 'Đã xảy ra lỗi', 'status' => 'error']);
    }

    public function updateState(Request $request){
        $id = $request->id;
        $state = $request->state;
        $exceptState = [0, 1, 2, 3];

        if(!in_array($state, $exceptState)){
            return response()->json(['status'=>'error', 'msg' => 'Cập nhật thất bại']);
        }
        $updated = $this->artRepo->update($id, ['state'=> $state]);
        if($updated){
            return response()->json(['status'=>'success', 'msg' => 'Cập nhật thành công']);
        }
        return response()->json(['status'=>'error', 'msg' => 'Cập nhật thất bại']);
    }
}

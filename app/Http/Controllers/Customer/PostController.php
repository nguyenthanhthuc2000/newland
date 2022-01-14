<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{

    public function detail($slug){
        return view('pages.post.detail_post');
    }

    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = $this->dirRepo->getOrDerBy()->reverse();
        $cat = $this->catRepo->getByAttributesAll(['type' => 0])->reverse();
        $data = [
            'province' => Controller::getProvince(),
            'cat' => $cat,
            'direction' => $direction
        ];
        return view('pages.post.post', $data);
    }

    public function getCategory(Request $request){
        $cat = $this->catRepo->getByAttributesAll(['type' => $request->type]);
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
                "content" => "required",//mô tả chi tiết
                "acreage" => "required",//diện tích
                "price" => "required",//giá
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

        $attributes = [
            "form" => $request->form,
            "category_id" => $request->category_id,
            "province_id" => $request->province_id,
            "district_id" => $request->district_id,
            "ward_id" => $request->ward_id,
            "street_id" => $request->street_id,
            "address_on_post" => $request->address_on_post,
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "content" => $request->content,
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
            "phone_contact" => $request->phone_contact,
            "address_contact" => $request->address_contact,
            "email_contact" => $request->email_contact,
            "user_id" => Auth::id(),
        ];

        $idCreated = $this->artRepo->create($attributes)->id;

        if($request->image && $idCreated){
            $imgArr = $request->image;
            $description_img = $request->description_img;
            for($i = 0; $i < count($imgArr); $i++){
                echo $imgArr[$i].','.$description_img[$i];
                $this->imgArtRepo->create(['id_article'=> $idCreated, 'image' => $imgArr[$i], 'description_img' => $description_img[$i]]);
            };
        }
        return back()->with('ok');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

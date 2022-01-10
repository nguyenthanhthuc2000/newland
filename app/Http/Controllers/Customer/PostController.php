<?php

namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
                "form" => "accepted",
                "street_id" => "required",
                "district_id" => "required",
                "ward_id" => "required",
                "province_id" => "required",
                "address_on_post" => "required",
                "title" => "required",
                "sub_title" => "required",
                "content" => "required",
                "acreage" => "required",
                "price" => "required",
                "unit" => "required",
                "legal_documents" => "required",
                "bedroom" => "required",
                "toilet" => "required",
                "floor" => "required",
                "way" => "required",
                "facade" => "required",
                "image" => "required",
                "name_contact" => "required",
                "phone_contact" => "required",
                "address_contact" => "required",
                "email_contact" => "required",
                "category_id" => "required",
            ],
            [
                "district_id.required" => "Vui lòng chọn Quận / Huyện",
                "ward_id.required" => "Vui lòng chọn Phường / Xã",
                "province_id.required" => "Vui lòng chọn Tỉnh / Thành phố",
                "unit.required" => "Vui lòng chọn Đơn vị",
                "category_id.required" => "Vui lòng chọn Loại bất động sản",
            ]
        );



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

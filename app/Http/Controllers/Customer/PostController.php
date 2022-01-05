<?php

namespace App\Http\Controllers\Customer;

use App\Repository\Province\ProvinceRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    protected $provinceRepo;

    public function __construct(
        ProvinceRepositoryInterface $provinceRepo
    )
    {
        $this->provinceRepo = $provinceRepo;
    }

    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province = $this->provinceRepo->getOrderBy('ASC');
        $data = [
            'province' => $province,
        ];
        return view('post.post', $data);
    }

    /**
     * get districts by province
     *
     * @return \Illuminate\Http\Response
     */
    public function getDistrict(Request $request){
        // dd();
        $province_id = $request->_province_id;
        return $this->provinceRepo->find($province_id)->districts()->get();
    }

    public function getWards(Request $request){
        // dd();
        $district_id = $request->_district_id;
        return $this->provinceRepo->find($province_id)->find($district_id)->districts()->wards()->get();
    }

    public function getStreet(Request $request){
        // dd();
        $province_id = $request->_province_id;
        return $this->provinceRepo->find($province_id)->districts()->get();
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
        //
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

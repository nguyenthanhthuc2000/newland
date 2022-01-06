<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Repository\Province\ProvinceRepositoryInterface;
use App\Repository\Ward\WardRepositoryInterface;
use App\Repository\District\DistrictRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $provinceRepo;
    protected $wardRepo;
    protected $districtRepo;
    protected $userRepo;

    public function __construct(
        ProvinceRepositoryInterface $provinceRepo,
        DistrictRepositoryInterface $districtRepo,
        WardRepositoryInterface $wardRepo,
        UserRepositoryInterface $userRepo

    )
    {
        $this->provinceRepo = new $provinceRepo;
        $this->districtRepo = new $districtRepo;
        $this->wardRepo = new $wardRepo;
        $this->userRepo = new $userRepo;
    }

     /**
     * get districts by province
     *
     * @return \Illuminate\Http\Response
     */
    protected function getProvince(){
        return $province = $this->provinceRepo->getOrderBy('ASC');
    }

    protected function getDistrict(Request $request){
        // dd();
        $province_id = $request->_province_id;
        return $this->provinceRepo->find($province_id)->districts()->get();
    }

    protected function getWards(Request $request){
        $district_id = $request->_district_id;
        return $this->districtRepo->find($district_id)->wards()->get();
    }

    protected function getStreet(Request $request){
        $district_id = $request->_district_id;
        return $this->wardRepo->find($district_id)->streets()->get();
    }
}

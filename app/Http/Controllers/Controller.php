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
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Direction\DirectionRepositoryInterface;
use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\ImagesArticle\ImagesArticleRepositoryInterface;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $provinceRepo;
    protected $wardRepo;
    protected $districtRepo;
    protected $userRepo;
    protected $catRepo;
    protected $dirRepo;
    protected $artRepo;
    protected $imgArtRepo;

    public function __construct(
        ProvinceRepositoryInterface $provinceRepo,
        DistrictRepositoryInterface $districtRepo,
        WardRepositoryInterface $wardRepo,
        UserRepositoryInterface $userRepo,
        CategoryRepositoryInterface $catRepo,
        DirectionRepositoryInterface $dirRepo,
        ArticleRepositoryInterface $artRepo,
        ImagesArticleRepositoryInterface $imgArtRepo

    )
    {
        $this->provinceRepo = $provinceRepo;
        $this->districtRepo = $districtRepo;
        $this->wardRepo = $wardRepo;
        $this->userRepo = $userRepo;
        $this->catRepo = $catRepo;
        $this->dirRepo = $dirRepo;
        $this->artRepo = $artRepo;
        $this->imgArtRepo = $imgArtRepo;
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

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
use App\Repository\Setting\SettingRepositoryInterface;
use App\Repository\Posts\PostRepositoryInterface;
use App\Repository\Project\ProjectRepositoryInterface;
use App\Repository\ProjectDistrict\ProjectDistrictRepositoryInterface;
use App\Repository\ProjectProvince\ProjectProvinceRepositoryInterface;
use App\Repository\ProjectType\ProjectTypeRepositoryInterface;
use App\Repository\ProjectWard\ProjectWardRepositoryInterface;

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
    protected $settingRepo;
    protected $postRepo;
    protected $projectRepo;
    protected $proTypeRepo;
    protected $proWardRepo;
    protected $proProvinceRepo;
    protected $proDistrictRepo;

    public function __construct(
        ProvinceRepositoryInterface $provinceRepo,
        DistrictRepositoryInterface $districtRepo,
        WardRepositoryInterface $wardRepo,
        UserRepositoryInterface $userRepo,
        CategoryRepositoryInterface $catRepo,
        DirectionRepositoryInterface $dirRepo,
        ArticleRepositoryInterface $artRepo,
        ImagesArticleRepositoryInterface $imgArtRepo,
        SettingRepositoryInterface $settingRepo,
        PostRepositoryInterface $postRepo,
        ProjectRepositoryInterface $projectRepo,
        ProjectTypeRepositoryInterface $proTypeRepo,
        ProjectWardRepositoryInterface $proWardRepo,
        ProjectProvinceRepositoryInterface $proProvinceRepo,
        ProjectDistrictRepositoryInterface $proDistrictRepo

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
        $this->settingRepo = $settingRepo;
        $this->postRepo = $postRepo;
        $this->projectRepo = $projectRepo;
        $this->proTypeRepo = $proTypeRepo;
        $this->proWardRepo = $proWardRepo;
        $this->proProvinceRepo = $proProvinceRepo;
        $this->proDistrictRepo = $proDistrictRepo;
    }

     /**
     * get districts by province
     *
     * @return \Illuminate\Http\Response
     */
    public function getProvince(){
        return $province = $this->provinceRepo->getOrderBy('ASC');
    }

    protected function getDistrict(Request $request){
        $province_id = $request->_province_id;
        return $this->provinceRepo->find($province_id)->districts()->get();
    }

    protected function getWards(Request $request){
        $district_id = $request->_district_id;
        return $this->districtRepo->find($district_id)->wards()->get();
    }

    // protected function getStreet(Request $request){
    //     $district_id = $request->_district_id;
    //     return $this->wardRepo->find($district_id)->streets()->get();
    // }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class ProjectController extends Controller
{

    public function createProject(){
        $direction = $this->dirRepo->getOrDerBy()->reverse();

        $province = Controller::getProvince();
        $typeProject = $this->proTypeRepo->getByAttributesAll(['status' => 1]);

        return view('pages.project.form_project', compact('direction', 'province', 'typeProject'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function personalProject(){

        $personalProject = $this->projectRepo->getByAttributes(['user_id' => Auth::id()]);

        return view('pages.project.personal_project', compact('personalProject'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $project = $this->projectRepo->find($id);
        if($project){
            if($this->projectRepo->delete($id)){
                return redirect()->back()->with('success', 'Xóa thành công!');
            }
            return redirect()->back()->with('error', 'Xóa thất bại, thử lại sau!');
        }
        return redirect()->back()->with('error', 'Xóa thất bại, thử lại sau!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request){
        $attributes = [
            'status' => $request->status
        ];
        if($this->projectRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($auto){
        if($auto == 'tu-dong'){
            $attributes = [
                'auto' => 1
            ];
        }
        else {
            $attributes = [
                'auto' => 0
            ];
        }
        $projects = $this->projectRepo->getByAttributes($attributes);
        return view('admin.pages.project.index', compact('projects', 'auto'));
    }

    public function crawlProject(){
        ini_set('max_execution_time', 360);
        $page = 1;
        for ($page; $page < 5; $page++){
            if($page == 1){
                $crawler = \Goutte::request('GET', 'https://cenhomes.vn/du-an/');
            }
            else{

                $crawler = \Goutte::request('GET', 'https://cenhomes.vn/du-an/page-'.$page);
            }
            $crawler->filter('.b__mainProduct .cen-col')->each(function ($node) {

                $url = $node->filter('.project-item .b_main-image-head a', 0)->attr('href');
                $photo = $node->filter('.project-item .b_main-image-head a img', 0)->attr('data-src');
                $name = $node->filter('h3', 0)->html();
                $code = substr(md5(microtime()),rand(0,5), 7);
                $address = '';
                $arrayAlbum = [];
                $arrayInfo = [];
                $content1 = \Goutte::request('GET', $url);
                $content = '';

                //Lấy album
                $arrayAlbum = $content1->filter('.owl-carousel a')->each(function ($img) {
                    return $img->attr('href');
                });

                //Lấy thông tin chi tiết
                $arrayInfo = $content1->filter('#information-tab .mb-16')->each(function ($info) {
                    $key = str_replace('&amp;', ' & ', $info->filter('label')->html());

                    $value = '';
                    try {
                        //Lấy nội dung thừa
                        $value = str_replace('&amp;', ' & ', $info->filter('span')->html());
                        $arr = [
                            $key => $value
                        ];
                        return $arr;
                    } catch (\Exception $e){

                    }
                });

                //Lấy loại, địa chỉ dự án
                $arrayAddress = $content1->filter('.head-content .b__breadcrumb .breadcrumb-item')->each(function ($info) {
                    return $info->filter('a')->html();
                });

                //Lấy tiện ích
                $arrayExtension = $content1->filter('.block-extension p')->each(function ($info) {

                    return str_replace('&amp;', ' & ', $info->html());
                });

                //Lấy Sơ đồ mặt bằng
                $arrayDesignProject = $content1->filter('#design_project .item img')->each(function ($info) {
                    return $info->attr('data-src');
                });

                $jsonProjectDesign = json_encode($arrayDesignProject);
                $jsonExtension = json_encode($arrayExtension);
                $jsonInfo = json_encode(array_filter($arrayInfo));
                $jsonAlbum = json_encode($arrayAlbum);

//                dd($arrayDesignProject, $arrayExtension, array_filter($arrayInfo), $arrayAlbum);

                //Lấy nội dung bài viết
                $contents = $content1->filter('#wrap_description')->each(function ($n1) {
                    $str = '';
                    try {
                        //Lấy nội dung thừa
                        $str = $n1->filter('.block-expand')->html();
                    } catch (\Exception $e){

                    }
                    return [$str, $n1->html()];
                });

                if(isset($contents[0])){
                    //Loại bõ nội dung thừa
                    if($contents[0][0] != ''){
                        $content = str_replace($contents[0][0], '', $contents[0][1]);
                    }
                    else{
                        $content = $contents[0][1];
                    }

                    $type = str_replace('&amp;', ' & ', $arrayAddress[2]);
                    $province = $arrayAddress[3];
                    $ward = $arrayAddress[5];
                    $district = $arrayAddress[4];


                    $type_id = null;
                    $project_ward_id = null;
                    $project_province_id = null;
                    $project_district_id = null;

                    $getType = $this->proTypeRepo->findByAttributes(['name' => $type]);
                    if($getType == null){
                        $query = $this->proTypeRepo->create(['name' => $type, 'slug' => slug($type), 'status' => 1]);
                        $type_id = $query->id;
                    }
                    else{
                        $type_id = $getType->id;
                    }

                    $proName = str_replace(' ', '%', $province);
                    $proName = str_replace('-', '%', $proName);
                    $getProvince = Province::where('_name', 'LIKE', $proName)->first();
                    if($getProvince){

    //                    if($getProvince == null){
    //                        $query = $this->proProvinceRepo->create(['name' => $pro]);
    //
    //                        $project_province_id = $query->id;
    //                    }
    //                    else{
                            $project_province_id = $getProvince->id;
    //                    }

                        $district = str_replace('Thành phố', '', $district);
                        $district = str_replace('Quận', '', $district);
                        $district = str_replace('Thị xã', '', $district);
                        $disName = str_replace(' ', '%', $district);
                        $disName = str_replace('-', '%', $disName);
                        $getDistrict = District::where('_name', 'LIKE', $disName)->where('_province_id', $project_province_id)->first();
                        if($getDistrict) {
//                    if($getDistrict == null){
//                        $query = $this->proDistrictRepo->create(['name' => $district, 'project_province_id' => $project_ward_id]);
//                        $project_district_id = $query->id;
//                    }
//                    else{
                        $project_district_id = $getDistrict->id;
//                    }
                            $ward = str_replace('Phường', '', $ward);
                            $ward = str_replace('Xã', '', $ward);
                            $wardName = str_replace(' ', '%', $ward);
                            $wardName = str_replace('-', '%', $wardName);
                            $getWard = Ward::where('_name', 'LIKE', $wardName)->where('_district_id', $project_district_id)->first();
//                            dd($getWard, $wardName);
//                    if($getWard == null){
//                        $query = $this->proWardRepo->create(['name' => $ward, 'project_province_id' => $project_province_id, 'project_district_id' => $project_district_id]);
//                        $project_ward_id = $query->id;
//                    }
//                    else{
                            if($getWard){
                                $project_ward_id = $getWard->id;
                                //Tạo mã code cho từng bài viết
                                $code = substr(md5(microtime()),rand(0,5), 7);
                                $slug = slug($name).'-'.$code;

                                $data = [
                                    'name' => $name,
                                    'slug' => $slug,
                                    'code' => $code,
                                    'photo' => $photo,
                                    'source' => $url,
                                    'content' => $content,
                                    'design_project' => $jsonProjectDesign,
                                    'utilities' => $jsonExtension,
                                    'album' => $jsonAlbum,
                                    'options' => $jsonInfo,
                                    'status' => 1,
                                    'crawl' => 1,
                                    'auto' => 1,
                                    'type' => 1,
                                    'project_ward_id' => $project_ward_id,
                                    'project_province_id' => $project_province_id,
                                    'project_district_id' => $project_district_id
                                ];

//                                dd($data);
                                //KIểm tra có tồn tại bài viết chưa
                                $check = $this->projectRepo->findByAttributes(['name' => $name]);
                                if(!$check){
                                    if(!$this->projectRepo->create($data)){

                                    }
                                }
                            }
//                    }
                        }
                    }


                }
            });
        }

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
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

        return view('admin.pages.project.index', compact('projects'));
    }

    public function crawlProject(){
        ini_set('max_execution_time', 360);
        $page = 1;
        for ($page; $page < 2; $page++){
            $crawler = \Goutte::request('GET', 'https://cenhomes.vn/du-an');
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
                    $key = $info->filter('label')->html();

                    $value = '';
                    try {
                        //Lấy nội dung thừa
                        $value = $info->filter('span')->html();
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
                    return $info->html();
                });

                //Lấy Sơ đồ mặt bằng
                $arrayDesignProject = $content1->filter('#design_project .item img')->each(function ($info) {
                    return $info->attr('data-src');
                });


                $jsonInfo = json_encode(array_filter($arrayInfo));
                $jsonAlbum = json_encode($arrayAlbum);
                $jsonInfo = json_encode($arrayInfo);
                $type = $arrayAddress[2];
                $province = $arrayAddress[3];
                $ward = $arrayAddress[4];
                $district = $arrayAddress[5];

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

                    dd(array_filter($arrayInfo), $arrayExtension, $arrayDesignProject, $arrayAlbum, $url, $photo, $name, $type, $province, $ward, $district, $content);
//
//                    //Lấy nguồn gốc cần lưu
//                    $outputSource = '';
//                    if(isset($source[0])){
//                        $outputSource = $source[0];
//                    }
//                    else{
//                        $outputSource = $url;
//                    }

//                    //Tạo mã code cho từng bài viết
//                    $code = substr(md5(microtime()),rand(0,5), 7);
//                    $slug = slug($title).'-'.$code;
//
//                    $data = [
//                        'title' => $title,
//                        'slug' => $slug,
//                        'code' => $code,
//                        'photo' => $img,
//                        'author' => str_replace('  ', '', $author[0]) ,
//                        'source' => str_replace(' ', '', $outputSource),
//                        'content' => $content,
//                        'status' => 1,
//                        'crawl' => 1,
//                    ];
//
//                    //KIểm tra có tồn tại bài viết chưa
//                    $check = $this->postRepo->findByAttributes(['title' => $title]);
//                    if(!$check){
//                        if(!$this->postRepo->create($data)){
//
//                        }
//                    }
                }
            });
        }

    }
}

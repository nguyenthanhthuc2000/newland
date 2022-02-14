<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use DOMDocument;

class PostsController extends Controller
{

    public function crawlNewsCafeF(){
        ini_set('max_execution_time', 360);
        $crawler = \Goutte::request('GET', 'https://cafef.vn/bat-dong-san.chn');
        $crawler->filter('#LoadListNewsCat .tlitem')->each(function ($node) {
            $title = $node->filter('h3')->text();
            $url = 'https://cafef.vn'.$node->filter('h3 > a', 0)->attr('href');
            $img = $node->filter('img')->attr('src');

            $content1 = \Goutte::request('GET', $url);
            $content = '';
            $author = '';
            $source = '';

            //Lấy link gốc của bài viết
            $source = $content1->filter('#form1')->each(function ($s) {
                $str = '';
                try {
                    $str = $s->filter('.link-source-full')->html();
                } catch (\Exception $e){

                }
                return $str;
            });

            //Lấy tên tác giả
            $author = $content1->filter('#form1 .author')->each(function ($a) {
                return $a->html();
            });

            //Lấy nội dung bài viết
            $contents = $content1->filter('#form1 #mainContent')->each(function ($n1) {

                $str = '';
                try {
                    //Lấy nội dung thừa
                    $str = $n1->filter('.link-content-footer')->html();
                } catch (\Exception $e){

                }

                return [$str, $n1->html()];
            });


            if(isset($contents)){
                //Loại bõ nội dung thừa
                if($contents[0][0] != ''){
                    $content = str_replace($contents[0][0], '', $contents[0][1]);
                }
                else{
                    $content = $contents[0][1];
                }

                //Lấy nguồn gốc cần lưu
                $outputSource = '';
                if(isset($source[0])){
                    $outputSource = $source[0];
                }
                else{
                    $outputSource = $url;
                }

                //Tạo mã code cho từng bài viết
                $code = substr(md5(microtime()),rand(0,5), 7);
                $slug = slug($title).'-'.$code;

                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'code' => $code,
                    'photo' => $img,
                    'author' => str_replace('  ', '', $author[0]) ,
                    'source' => str_replace(' ', '', $outputSource),
                    'content' => $content,
                    'status' => 1,
                    'crawl' => 1,
                ];

                //KIểm tra có tồn tại bài viết chưa
                $check = $this->postRepo->findByAttributes(['title' => $title]);
                if(!$check){
                    if(!$this->postRepo->create($data)){

                    }
                }
            }
        });

        return back();
    }

    public function crawlPosts(){
       ini_set('max_execution_time', 360);
        $page = 1;
        for ($page ; $page < 6; $page++) {
            $crawler = \Goutte::request('GET', 'https://duan.batdongsan.com.vn/khu-do-thi-moi-song-cong-tn/khu-do-thi-cau-truc-song-cong-pj5521');
            $output = $crawler->filter('body')->each(function ($node) {
//                    $html = $node->filter('a')->attr('href');
//                $url = $node->filter('.re__project-list')->html();
//                return $html;
                dd($node->html());
            });
        }

//                $img = $node->filter('img')->attr('src');

//                $content1 = \Goutte::request('GET', $url);
//                $content = '';
//
//                $contents = $content1->filter('#form1 #mainContent')->each(function ($n1) {
//
//                    $str = '';
//                    try {
//                        $str = $n1->filter('.link-content-footer')->html();
//                    } catch (\Exception $e){
//
//                    }
//
//                    return [$str, $n1->html()];
//                });


//                if(isset($contents)){
//                    if($contents[0][0] != ''){
//                        $content = str_replace($contents[0][0], '', $contents[0][1]);
//                    }
//                    else{
//                        $content = $contents[0][1];
//                    }
//
//                    $code = substr(md5(microtime()),rand(0,5), 7);
//                    $slug = slug($title).'-'.$code;
//
//                    $data = [
//                        'title' => $title,
//                        'slug' => $slug,
//                        'code' => $code,
//                        'photo' => $img,
//                        'author' => $url,
//                        'content' => $content,
//                        'status' => 1
//                    ];
//
//                    $check = $this->postRepo->findByAttributes(['title' => $title]);
//                    if(!$check){
//                        if(!$this->postRepo->create($data)){
//
//                        }
//                    }
//                }



//        ini_set('max_execution_time', 360);
//        //Trang cần lấy dữ liệu
//        $page = 4;
//        for ($page; $page < 6; $page++){
//
//            $crawler = \Goutte::request('GET', 'https://cafeland.vn/tin-tuc/page-'.$page.'/');
//
//            //Lấy danh sách bài viết
//            $crawler->filter('.left-col .box-content .list-type-14 li')->each(function ($node) {
//                //Lấy url, img, title bài viết
//                $title = $node->filter('h3')->text();
//                $url = $node->filter('h3 > a', 0)->attr('href');
//                $img = $node->filter('img')->attr('data-src');
//
//                if(strpos( $url, 'https://cafeland.vn/tin-tuc') !== false){
//                    //Lưu thông tin bài viết
//                    $content1 = \Goutte::request('GET', $url);
//                    $content2 = \Goutte::request('GET', $url);
//                    //Thấy có 2 box chứa nội dung
//                    $content = '';
//                    $contents = $content1->filter('#sevenBoxNewContentInfo')->each(function ($n1) {
//                        return $n1->html();
//                    });
//                    if(isset($contents[0])){
//                        $content = $contents[0];
//                    }
//                    else{
//                        $valContent2 = $content2->filter('#sevenBoxNewContentInfoNo')->each(function ($n2) {
//                            return $n2->html();
//                        });
//                        $content = $valContent2[0];
//                    }
//
//                    $code = substr(md5(microtime()),rand(0,5), 7);
//                    $slug = slug($title).'-'.$code;
//
//                    $data = [
//                        'title' => $title,
//                        'slug' => $slug,
//                        'code' => $code,
//                        'photo' => $img,
//                        'author' => $url,
//                        'content' => $content,
//                        'status' => 1
//                    ];
//
//                    $check = $this->postRepo->findByAttributes(['title' => $title]);
//                    if(!$check){
//                        if(!$this->postRepo->create($data)){
//                            dd($data);
//                        }
//                    }
//                }
//
//            });
//        }


//        ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
//        $doc = new \DOMDocument('1.0', 'UTF-8');
//
//        // set error level
//        $internalErrors = libxml_use_internal_errors(true);
//
//        $url = "https://batdongsan.com.vn";
//        $html = file_get_contents($url);
//        $doc->loadHTML($html);
//        $links = $doc->getElementsByClassName('js__project-card');
//        dd($links);

//        //link cần lấy nội dung
//        $arrLinks = [];
//        foreach($links as $link){
//            $goal = $link->getAttribute('href');
//            if(strpos($goal,$url) !== false && strpos($goal, '.html') !== false){
//                array_push($arrLinks, $goal);
//            }
//        }
//
//        //Lấy và lưu bài viết
//        foreach ($arrLinks as $l){
//            $url = $l;
//            $html = file_get_contents($url);
//            $doc->loadHTML($html);
//            $content = $doc->getElementById('sevenBoxNewContentInfo');
//            $title = $doc->getElementsByTagName('h1')[0];
//            foreach ($content as $table)
//            {
//                echo DOMinnerHTML($table);
//            }
////            dd($title->nodeValue, $content);
//        }
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editByType($type){
        $news = $this->postRepo->getByType($type);
        if($news){
            return view('admin.pages.news.form_type', compact('news'));
        }
        return redirect()->route('home.page404');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $post = $this->postRepo->find($id);
        if($post){
            if($this->postRepo->delete($id)){
                return redirect()->route('news.manage')->with('success', 'Xóa thành công!');
            }
            return redirect()->route('news.manage')->with('error', 'Xóa thất bại, thử lại sau!');
        }
        return redirect()->route('news.manage')->with('error', 'Xóa thất bại, thử lại sau!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatusNews(Request $request){
        $attributes = [
            'status' => $request->status
        ];
        if($this->postRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }

    public function edit($id){
        $id = encrypt_decrypt($id, 'decrypt');
        $news = $this->postRepo->find($id);
        if($news){
            $route = 'news.update';
            return view('admin.pages.news.form', compact('news', 'route'));
        }
        return redirect()->route('home.page404');
    }

    public function update(Request $request, $id){
        $id = encrypt_decrypt($id, 'decrypt');
        $news = $this->postRepo->find($id);
        if($news){
            if($news->type == null ){
                $this->validate($request,
                    [
                        'title' => ['required'],
                        'contents' => ['required'],
                        'author' => ['required'],
                    ],
                    [
                        '*.required' => 'Không bỏ trống trường này',
                    ],
                );

                $slug = slug($request->title).'-'.$news->code;
                $arrayData = [
                    'title' => $request->title,
                    'content' => $request->contents,
                    'slug' => $slug,
                    'author' => $request->author
                ];
                if($request->photo){
                    $this->validate($request,
                        [
                            'photo' => ['mimes:jpg,png', 'required'],
                        ],
                        [
                            'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                        ]
                    );
                    $photo = substr(md5(microtime()), rand(0, 5), 10) . '.' . $request->file('photo')->getClientOriginalExtension();
                    $request->file('photo')->move('uploads/news/', $photo);
                    $arrayData = $arrayData + array('photo' => $photo);
                    $arrayData = $arrayData + array('crawl' => 0);

                    //xóa hình cũ
                    if (File::exists(public_path() . "/upload/news/" . $news->photo)) {
                        File::delete(public_path() . "/upload/news/" . $news->photo);
                    }
                }

                $query = $this->postRepo->update($news->id, $arrayData);
                if($query){
                    return redirect()->route('news.manage')->with('success', 'Cập nhật tin tức thành công');
                }
                return redirect()->route('news.manage')->with('error', 'Cập nhật thất bại, thử lại sau!');
            }
            else{
                $this->validate($request,
                    [
                        'contents' => ['required'],
                    ],
                    [
                        '*.required' => 'Không bỏ trống trường này',
                    ],
                );

                $arrayData = [
                    'content' => $request->contents,
                ];
                $query = $this->postRepo->update($news->id, $arrayData);
                if($query){
                    return back()->with('success', 'Cập nhật thành công');
                }
                return back()->with('error', 'Cập nhật thất bại, thử lại sau!');
            }
        }

        return redirect()->route('news.manage')->with('error', 'Không tìm thấy tin tức!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $news = $this->postRepo->getAllNews();
        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        $route = 'news.store';

        return view('admin.pages.news.form', compact('route'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $this->validate($request,
            [
                'photo' => ['mimes:jpg,png', 'required'],
                'title' => ['required'],
                'contents' => ['required'],
                'author' => ['required'],
            ],
            [
                'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                '*.required' => 'Không bỏ trống trường này',
            ],
        );

        $code = substr(md5(microtime()),rand(0,5), 7);
        $slug = slug($request->title).'-'.$code;

        $image = substr(md5(microtime()),rand(0,5), 35).'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/news/', $image);
        $arrayData = [
            'title' => $request->title,
            'content' => $request->contents,
            'photo' => $image,
            'slug' => $slug,
            'author' => $request->author,
            'code' => $code
        ];

        $query = $this->postRepo->create($arrayData);
        if($query){
            return redirect()->route('news.manage')->with('success', 'Thêm mới tin tức thành công');
        }
        return redirect()->route('news.manage')->with('error', 'Thêm mới tin tức thất bại, thử lại sau');
    }
}

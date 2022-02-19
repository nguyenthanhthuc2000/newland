<?php

namespace App\Http\Controllers;

use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function allArticle(){
        $articles = $this->artRepo->getByAttributes(['status' => 1]);
        $title = 'Bất động sản trên toàn quốc';
        $data = [
            'title' => $title,
            'lstArticle' => $articles,
        ];
        return view('pages.post.article_list', $data);
    }

    public function featureArticle(){
        $articles = $this->artRepo->getByAttributes(['status' => 1, 'featured' => 1]);
        $title = 'Tin tức nổi bật';
        $data = [
            'title' => $title,
            'lstArticle' => $articles,
        ];
        return view('pages.post.article_list', $data);
    }

    public function searchByPrice(Request $request)
    {
        $negotiable = $request->gia;
        $from = convert_words_to_numbers($request->tu);
        $to = convert_words_to_numbers($request->den);
        $result = Article::price($from, $to, $negotiable)->paginate();

        $title = 'Các tin đăng có giá '.($from == 0 ? 'dưới '.convert_number_to_words($to) : 'từ '.convert_number_to_words($from). (convert_number_to_words($to) ? ' đến '. convert_number_to_words($to) : ''));
        $data = [
            'title' => $title,
            'lstArticle' => $result,
        ];
        return view('pages.post.article_list', $data);
    }

    public function filter(Request $request){
        if(!$request->all() ||
            (
                (isset($request->all()['danh-muc']) && $request->all()['danh-muc'] == null) &&
                (isset($request->all()['hinh-thuc']) && $request->all()['hinh-thuc'] == null) &&
                (isset($request->all()['khu-vuc']) && $request->all()['khu-vuc'] == null) &&
                (isset($request->all()['muc-gia']) && $request->all()['muc-gia'] == null) &&
                (isset($request->all()['dien-tich']) && $request->all()['dien-tich'] == null)
            )
        ){
            return redirect()->route('article.index');
        }
        if(isset($request->all()['danh-muc'])){
            $idCat = $this->catRepo->getByAttributes(['slug' => $request->all()['danh-muc']])->first()->id;
            $request->request->add(['id-danh-muc' => $idCat]);
        }
        if(isset($request->all()['khu-vuc'])){
            $idArea = $this->provinceRepo->getByAttributes(['_code' => $request->all()['khu-vuc']])->first()->id;
            $request->request->add(['id-khu-vuc' => $idArea]);
        }
        $result = Article::filter($request->all())->paginate();
        $title = 'Kết quả tìm kiếm';
        $data = [
            'title' => $title,
            'lstArticle' => $result,
        ];
        return view('pages.post.article_list', $data);
    }
}

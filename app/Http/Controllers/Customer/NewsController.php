<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $lstNews = $this->postRepo->getByAttributes(['status' => 1]);
        $data = [
            'title' => 'Danh sách tin tức',
            'list' => $lstNews
        ];
        return view('pages.news.news_list', $data);
    }

    public function detail($slug){
        $news = $this->postRepo->getItemsBySlug($slug);
        $data = [
            'title' => $news->title,
            'detail' => $news
        ];
        return view('pages.news.detail', $data);
    }
}

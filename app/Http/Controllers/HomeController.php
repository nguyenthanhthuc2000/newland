<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(Hash::make('12345678'));
        $articles = $this->artRepo->getByStatus([1])->where('state', 0);
        $featureArticled = $articles->where('featured', 1);
        $news = $this->postRepo->getByAttributes(['status' => 1]);
        $data = [
            'articles' => $articles,
            'featuredArticled' => $featureArticled,
            'news' => $news
        ];
        return view('pages.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function page404(){
        return view('errors.404');
    }


}

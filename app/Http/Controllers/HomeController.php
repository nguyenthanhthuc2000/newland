<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $articles = $this->artRepo->getByStatus([1]);
        $featureArticled = $articles->where('featured', 1);
        $data = [
            'articles' => $articles,
            'featureArticled' => $featureArticled
        ];
        return view('pages.index', $data);
    }
    public function page404(){
        return view('errors.404');
    }

}

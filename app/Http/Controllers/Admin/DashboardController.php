<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $articles = $this->artRepo->getByStatus([0]);
        $data = [
            'articles' => $articles,
        ];
        return view('admin.pages.index', $data);
    }

    public function setting(){
        return view('admin.pages.setting.website');
    }

}

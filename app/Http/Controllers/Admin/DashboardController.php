<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $articles = $this->artRepo->getByStatus([0, 2]);
        $data = [
            'articles' => $articles,
        ];
        return view('admin.layouts.master_layout', $data);
    }
}

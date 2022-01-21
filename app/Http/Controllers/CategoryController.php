<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory(){

        return view('pages.category.index_category');
    }
}

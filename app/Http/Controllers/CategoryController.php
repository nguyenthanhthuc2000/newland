<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory($slug){
        $category = $this->catRepo->getItemsBySlug($slug);
        if(!$category){
            return abort('404');
        }
        $getCategory = $category->first();
        $articles = $this->artRepo->getByAttributes(['category_id' => $getCategory->id]);
        $data = [
            'title' => $getCategory->name,
            'lstArticle' => $articles
        ];
        return view('pages.post.article_list', $data);
    }
}

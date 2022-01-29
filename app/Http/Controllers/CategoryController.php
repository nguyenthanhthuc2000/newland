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
        $articles = $this->artRepo->getByAttributes(['category_id' => $category->id]);
        $data = [
            'title' => $category->name,
            'lstArticle' => $articles
        ];
        return view('pages.post.article_list', $data);
    }
}

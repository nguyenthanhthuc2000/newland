<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\never
     */
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


    //ADMIN

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function manage(){
        $categories = $this->catRepo->getAll();

        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * @param Request $request //id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request){

        $id = encrypt_decrypt($request->id, 'decrypt');
        $attributes = [
            'status' => $request->status
        ];
        if($this->catRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }
}

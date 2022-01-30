<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;

class AdminArticleController extends Controller
{

    public function updateVipArticle(Request $request){
        $attributes = [
            'vip' => $request->status
        ];
        if($this->artRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateFeaturedArticle(Request $request){
        $attributes = [
            'featured' => $request->status
        ];
        if($this->artRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listArticle(){
//        dd(Filter::$FILTER_PRICE);
        $articles = $this->artRepo->getByStatus([0, 1, 2]);
        $data = [
            'articles' => $articles,
        ];
        return view('admin.pages.article.index', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unconfirmArticle(Request $request){
        $attributes = [
            'feedback' => $request->feedback,
            'status' => 2 //2: bị từ chối
        ];
        if($this->artRepo->update($request->id, $attributes)) {
            return response()->json(['messages' => 'Đã từ chối', 'status' => 200]);
        }
        return response()->json(['messages' => 'Lỗi, thử lại sau', 'status' => 500]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmArticle(Request $request){
        $attributes = [
            'status' => 1 //1: duyệt
        ];
        if($this->artRepo->update($request->id, $attributes)) {
            return response()->json(['messages' => 'Đã duyệt', 'status' => 200]);
        }
        return response()->json(['messages' => 'Lỗi, thử lại sau', 'status' => 500]);
    }
}

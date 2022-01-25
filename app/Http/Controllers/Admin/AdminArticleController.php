<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    public function updateStatus(Request $request){
        $attributes = [
            'status' => $request->status
        ];
        if($this->userRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listCustomer(){
        $attributes = [
            'level' => 0
        ];
        $data = [
            'customers' => $this->userRepo->getByAttributes($attributes)
        ];
        return view('admin.pages.customer.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function info(){
        $data = [
            'province' => Controller::getProvince(),
            'info' => $this->userRepo->find(Auth::id())
        ];
        return view('auth.info', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function personalArticle() {
        $personalArticle = $this->artRepo->getByAttributes(['user_id' => Auth::id()]);
        $articlesUnverified = $personalArticle->where('status', 0);
        $articlesCanled = $personalArticle->where('status', 2);
        $data = [
            'personalArticle' => $personalArticle,
            'articlesUnverified' => $articlesUnverified,
            'articlesCanled' => $articlesCanled
        ];
        return view('auth.personal_article', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function articlesSameEntrant($id) {
        $user = $this->userRepo->find($id);
        if(!$user){
            return abort('404');
        }
        $lstArticle = $this->userRepo->find($id)->articles;
        $data = [
            'title' => 'Các tin đăng bởi "'.$user->name.'"',
            'lstArticle' => $lstArticle,
            'user' => $user
        ];
        return view('pages.post.article_list', $data);
    }

}

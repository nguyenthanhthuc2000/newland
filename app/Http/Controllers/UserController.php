<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

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

    public function personalArticle() {
        $personalArticle = $this->artRepo->getByAttributes(['user_id' => Auth::id()]);
        $data = [
            'personalArticle' => $personalArticle
        ];
        return view('auth.personal_article', $data);
    }

    public function articlesSameEntrant($id) {
        $user = $this->userRepo->find($id);
        $lstArticle = $this->userRepo->find($id)->articles;
        $data = [
            'title' => 'Các tin đăng bởi "'.$user->name.'"',
            'lstArticle' => $lstArticle,
            'user' => $user
        ];
        return view('pages.post.article_list', $data);
    }

}

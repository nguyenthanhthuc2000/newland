<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function profile($id){
        $id = encrypt_decrypt($id, 'decrypt');
        $info = $this->userRepo->find($id);
        $attributes = [
            'user_id' => $id
        ];
        $articles = $this->artRepo->getByAttributes($attributes);
        if($info){
            return view('admin.pages.customer.profile', compact('info', 'articles'));
        }
        return redirect()->route('home.page404');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
    public function personalArticle(Request $request) {
        $personalArticle = $this->artRepo->getByAttributes(['user_id' => Auth::id()]);
        $articlesDeposited = $personalArticle->where('state', 1);
        if($request){
            if(isset($request->all()['trang-thai'])){
                $personalArticle = $this->artRepo->getByAttributes(['user_id' => Auth::id(),'status'=> $request->all()['trang-thai']]);
            }
            if(isset($request->all()['tinh-trang'])){
                $personalArticle = $this->artRepo->getByAttributes(['user_id' => Auth::id(), 'state'=> $request->all()['tinh-trang']]);
            }
        }
        $data = [
            'personalArticle' => $personalArticle,
            'articlesDeposited' => $articlesDeposited,
        ];
        return view('pages.post.personal_article', $data);
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

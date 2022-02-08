<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class PostsController extends Controller
{

    /**
     * @param $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editByType($type){
        $news = $this->postRepo->getByType($type);
        if($news){
            return view('admin.pages.news.form_type', compact('news'));
        }
        return redirect()->route('home.page404');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $post = $this->postRepo->find($id);
        if($post){
            if($this->postRepo->delete($id)){
                return redirect()->route('news.index')->with('success', 'Xóa thành công!');
            }
            return redirect()->route('news.index')->with('error', 'Xóa thất bại, thử lại sau!');
        }
        return redirect()->route('news.index')->with('error', 'Xóa thất bại, thử lại sau!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatusNews(Request $request){
        $attributes = [
            'status' => $request->status
        ];
        if($this->postRepo->update($request->id, $attributes)){
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 500]);
    }

    public function edit($id){
        $id = encrypt_decrypt($id, 'decrypt');
        $news = $this->postRepo->find($id);
        if($news){
            $route = 'news.update';
            return view('admin.pages.news.form', compact('news', 'route'));
        }
        return redirect()->route('home.page404');
    }

    public function update(Request $request, $id){
        $id = encrypt_decrypt($id, 'decrypt');
        $news = $this->postRepo->find($id);
        if($news){
            if($news->type == null ){
                $this->validate($request,
                    [
                        'title' => ['required'],
                        'contents' => ['required'],
                        'author' => ['required'],
                    ],
                    [
                        '*.required' => 'Không bỏ trống trường này',
                    ],
                );

                $slug = slug($request->title).'-n-'.$news->code;
                $arrayData = [
                    'title' => $request->title,
                    'content' => $request->contents,
                    'slug' => $slug,
                    'author' => $request->author
                ];
                if($request->photo){
                    $this->validate($request,
                        [
                            'photo' => ['mimes:jpg,png', 'required'],
                        ],
                        [
                            'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                        ]
                    );
                    $photo = substr(md5(microtime()), rand(0, 5), 10) . '.' . $request->file('photo')->getClientOriginalExtension();
                    $request->file('photo')->move('uploads/news/', $photo);
                    $arrayData = $arrayData + array('photo' => $photo);

                    //xóa hình cũ
                    if (File::exists(public_path() . "/upload/news/" . $news->photo)) {
                        File::delete(public_path() . "/upload/news/" . $news->photo);
                    }
                }

                $query = $this->postRepo->update($news->id, $arrayData);
                if($query){
                    return redirect()->route('news.index')->with('success', 'Cập nhật tin tức thành công');
                }
                return redirect()->route('news.index')->with('error', 'Cập nhật thất bại, thử lại sau!');
            }
            else{
                $this->validate($request,
                    [
                        'contents' => ['required'],
                    ],
                    [
                        '*.required' => 'Không bỏ trống trường này',
                    ],
                );

                $arrayData = [
                    'content' => $request->contents,
                ];
                $query = $this->postRepo->update($news->id, $arrayData);
                if($query){
                    return back()->with('success', 'Cập nhật thành công');
                }
                return back()->with('error', 'Cập nhật thất bại, thử lại sau!');
            }
        }

        return redirect()->route('news.index')->with('error', 'Không tìm thấy tin tức!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $news = $this->postRepo->getAllNews();
        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        $route = 'news.store';

        return view('admin.pages.news.form', compact('route'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
        $this->validate($request,
            [
                'photo' => ['mimes:jpg,png', 'required'],
                'title' => ['required'],
                'contents' => ['required'],
                'author' => ['required'],
            ],
            [
                'image.mimes' => 'Vui lòng chọn đúng định dạng (png,jpg)',
                '*.required' => 'Không bỏ trống trường này',
            ],
        );

        $code = substr(md5(microtime()),rand(0,5), 7);
        $slug = slug($request->title).'-n-'.$code;

        $image = substr(md5(microtime()),rand(0,5), 35).'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/news/', $image);
        $arrayData = [
            'title' => $request->title,
            'content' => $request->contents,
            'photo' => $image,
            'slug' => $slug,
            'author' => $request->author,
            'code' => $code
        ];

        $query = $this->postRepo->create($arrayData);
        if($query){
            return redirect()->route('news.index')->with('success', 'Thêm mới tin tức thành công');
        }
        return redirect()->route('news.index')->with('error', 'Thêm mới tin tức thất bại, thử lại sau');
    }
}

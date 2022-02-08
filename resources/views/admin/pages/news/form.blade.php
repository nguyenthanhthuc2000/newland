@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 pos-r" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12 pt-3">
            <form action="{{ route($route, isset($news) ? encrypt_decrypt($news->id) : '') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex mb-2" style="justify-content: space-between;    align-items: center;">
                    <h4 class="c-grey-900 m-0">{{ isset($news) ? 'Cập nhật' : 'Thêm mới' }} tin tức </h4>
                    <button type="submit" class="btn btn-primary btn-color btn__border">Lưu</button>
                </div>
                <!-- #Sales Report ==================== -->
                <div class="row gap-20">
                    <div class="col-md-8 col-12 pt-3">
                        <div class="bgc-white p-20 bd">
                            <div class="">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Tiêu đề <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ isset($news) ? $news->title : '' }}" name="title" id="title" placeholder="Tiêu đề tin tức">
                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="ck_news">Nội dung <span style="color:red;">*</span></label>
                                    <textarea class="form-control" id="ck_news" name="contents">{{ isset($news) ? $news->content : '' }}</textarea>
                                    @error('contents')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="author">Tác giả <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ isset($news) ? $news->author : '' }}" name="author" id="author" placeholder="Tác giả">
                                    @error('author')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 pt-3 mb-3">
                        <div class="bgc-white p-20 bd">
                            <div class="">
                                <div class="mb-3">
                                    <label class="form-label" for="image">Ảnh đại diện <span style="color: red;">*</span></label>
                                    <input type="file" name="photo"  id="input_file_img" class="form-control" id="image" hidden>
                                    @error('photo')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="review-img">
                                        <img id="review-img" class="img-fluid" src="{{ getUrlImageUpload(isset($news) ? $news->photo : '' , 'news') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

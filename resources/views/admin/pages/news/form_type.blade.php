@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 pos-r" xmlns="http://www.w3.org/1999/html">
        @include('admin.layouts.alert')
        <div class="col-md-12 pt-3">
            <form action="{{ route('news.update', $news->code) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex mb-2" style="justify-content: space-between;    align-items: center;">
                    <h4 class="c-grey-900 m-0">{{$news->title}} </h4>
                    <button type="submit" class="btn btn-primary btn-color btn__border">Lưu</button>
                </div>
                <!-- #Sales Report ==================== -->
                <div class="row gap-20">
                    <div class="col-md-12 col-12 pt-3">
                        <div class="bgc-white p-20 bd">
                            <div class="">
                                <div class="mb-3">
                                    <label class="form-label" for="ck_news">Nội dung <span style="color:red;">*</span></label>
                                    <textarea class="form-control" id="ck_news" name="contents">{{ isset($news) ? $news->content : '' }}</textarea>
                                    @error('contents')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

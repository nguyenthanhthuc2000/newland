@extends('layouts.master_layout')
@section('title')
    {{ $title }}
@endsection
@section('main')
    <div class="row">
        <div class="post-form-action col-8 pt-3">
            <h3>{{ $title }}</h3>
            <p>Hiện có {{ $list->count() }} tin tức.</p>
            <div class="l__a">
                @if ($list->count() == 0)
                    <strong>Không có bài viết.</strong>
                @else
                    @foreach ($list as $l)
                    <a href="{{ route('news.detail', $l->slug) }}" class="content-title-moblie mb-2">
                        <h5 class="text-split-2 mb-2 {{ $l->featured == 1 ? 'color-red' : 'color-blue' }}">{{ $l->title }}
                        </h5>
                    </a>
                        <div class="l__a-article row mb-4">
                            <a class="l__a-article-img col-sm-4 col-5 card-image{{ ($l->featured == 1) ? ' card-featured' : '' }}">
                                <img class="w-100 img-fluid img" src="{{ $l->photo }}" alt="">
                            </a>
                            <div class="l__a-article-content col-sm-8 col-7 p-3">
                                <a href="{{ route('news.detail', $l->slug) }}" class="card-body">
                                    <h5 class="content-title text-split-2 {{ $l->featured == 1 ? 'color-red' : 'color-blue' }}">
                                       {{ $l->title }}
                                    </h5>
                                    <p class="content-price mb-0 text-split-2"><strong>
                                        {{ $l->desc }}
                                    </strong></p>
                                </a>
                                <div class="card__footer card-footer content-footer d-flex justify-content-between align-items-center">
                                    <p class="mb-0 card-time"><i class="fal fa-calendar-alt"></i> {{ $l->created_at }}</p>
                                    <p class="mb-0 card-heart"><i class="fal fa-heart"></i></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="paginate-styling">
                {{ $list->appends(request()->only(['hinh-thuc', 'danh-muc', 'khu-vuc', 'muc-gia', 'dien-tich', 'tu', 'den']))->links() }}
            </div>
        </div>
    </div>
@endsection

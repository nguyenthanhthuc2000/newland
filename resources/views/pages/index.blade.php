@extends('layouts.master_layout')
@section('title', 'Trang chủ')
@section('slider')
    @include("layouts.slider")
@endsection
@section('main')
   <div class="box-post  pt-3 pb-2">
       <div class="box-title d-flex p-2  " style="justify-content: space-between; align-items: center">
           <h3 class="text-center text__title">Tin tức mới nhất</h3>
           <a href="" class="view-more">Xem tất cả<i class="fal fa-arrow-right"></i></a>
       </div>
       <div class="slick-bv">
           @foreach ($news as $n)
            <div class="padding-article box__article">
                <div class="row">
                    <div class="col">
                <div class="card card-post h-100" style="min-height: 340px">
                    <a href="{{ 'slug' }}"  class="card-image">
                        <img src="{{ getUrlImageUpload($n->photo, 'news') }}" class="card-img-post" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h6 class="text-split-2 card__title fw-bold">{{ $n->title }}</h6>

                    </a>
                    <div class="card-footer card__footer d-flex mt-3" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> {{ $n->created_at }}</p>
                        <p class="mb-0 card-view"><i class="fal fa-book-reader"></i></p>
                    </div>
                </div></div>
            </div>
            </div>
           @endforeach
       </div>
   </div>

    {{-- BẤT ĐỘNG SẢN CHO BẠN --}}
    <div class="box-product pt-5 pb-2">
        <div class="box-title d-flex pt-2 pb-2 justify-content-between align-items-center">
            <h3 class="text-center text__title">Bất động sản cho bạn</h3>
            <a href="{{ route('article.index') }}">Xem thêm <i class="fal fa-arrow-right"></i></a>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-3 col-md-6 box__article mb-4">
                    @php
                        $img_article = [];
                        $img = '';
                        $img_article = $article->imagesArticle->toArray();
                        $img = ( $img_article && $img_article[0]) ? $img_article[0]['image'] : null;
                    @endphp
                    <div class="card" >
                        <a href="{{ route('post.detail',$article->slug) }}" class="card-image{{ ($article->featured == 1) ? ' card-featured' : '' }}">
                            <img src="{{ getUrlImageUpload($img) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body card__article__body position-relative">
                            <h5 class="text-split-2"><a href="{{ route('post.detail',$article->slug) }}" class="stretched-link card-title {{ $article->featured == 1 ? 'color-red' : 'color-blue' }}">{!! checkVip($article->vip) !!}  {{ $article->title }}</i>
                                </a></h5>
                            <p class="card-text mb-0 text-split-1 card__price">
                                <strong>
                                    {{
                                        price_project($article->price, $article->acreage, $article->unit)['total_price'].' - '.$article->acreage .' m²'
                                    }}
                                </strong>
                            </p>
                            <p class="mb-0 text-split-1 card__address">{{ $article->address_on_post }}</p>
                        </div>
                        <div class="card__footer d-flex p-3 pt-0 justify-content-between align-items-center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> {{ $article->created_at->format('d/m/Y') }}</p>
                            <p class="mb-0 card__heart"><i class="fal fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="banner pt-4 pb-4 slick-banner">
        @foreach($getBanners as $getBanner)
        <a href="{{$getBanner->link}}">
            <img class="w-100" src="{{asset('uploads/slider/'.$getBanner->image)}}" alt="{{$getBanner->description_img}}" target="_blank">
        </a>
        @endforeach
    </div>
    <div class="box-product pt-2 pb-2">
        <div class="box-title d-flex p-2" style="justify-content: space-between; align-items: center">
            <h3 class="text-center text__title">Tin nổi bật</h3>
            <a href="{{ route('article.featured') }}">Xem thêm <i class="fal fa-arrow-right"></i></a>
        </div>
        <div class="slick-nb">
            @foreach ($featuredArticled as $article)
                <div class="padding-article box__article mb-4">
                    @php
                        $img_article = [];
                        $img = '';
                        $img_article = $article->imagesArticle->toArray();
                        $img = ( $img_article && $img_article[0]) ? $img_article[0]['image'] : null;
                    @endphp
                    <div class="card">
                        <a href="{{ route('post.detail',$article->slug) }}" class="card-image card-highlight card-featured">
                            <img src="{{asset(getUrlImageUpload($img))}}" class="card-img-top" alt="...">
                        </a>
                        <a class="card-body card__article__body" href="{{ route('post.detail',$article->slug) }}">
                            <h5 class="text-split-2 card-title {{ $article->featured == 1 ? 'color-red' : 'color-blue' }}" >{!! checkVip($article->vip) !!} {{ $article->title }}</h5>
                            <p class="card-text mb-0 text-split-1 card__price">
                                <strong>
                                    {{
                                        price_project($article->price, $article->acreage, $article->unit)['total_price'].' - '.$article->acreage .' m²'
                                    }}
                                </strong>
                            </p>
                            <p class="mb-0 text-split-1 card__address">{{ $article->address_on_post }}</p>
                        </a>
                        <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> {{ $article->created_at->format('d/m/Y') }}</p>
                            <p class="mb-0 card__heart"><i class="fal fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

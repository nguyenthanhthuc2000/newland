@extends('layouts.master_layout')
@section('title')
    {{ $title }}
@endsection
@section('main')
    <div class="row">
        <div class="post-form-action col-sm-8 pt-3">
            <h3>{{ $title }}</h3>
            <p>Hiện có {{ $lstArticle->count() }} bất động sản.</p>
            <div class="l__a">
                @if ($lstArticle->count() == 0)
                    <strong>Không có bài viết.</strong>
                @else
                    @foreach ($lstArticle as $l)
                    <a href="{{ route('post.detail', $l->slug) }}" class="content-title-moblie mb-2">
                        <h5 class="text-split-2 mb-2 {{ $l->featured == 1 ? 'color-red' : 'color-blue' }}">{!! checkVip($l->vip) !!}{{ $l->title }}
                        </h5>
                    </a>
                        <div class="l__a-article row mb-4">
                            <a class="l__a-article-img col-sm-4 col-5 card-image{{ ($l->featured == 1) ? ' card-featured' : '' }}">
                                <img class="w-100 img-fluid img" src="{{ getUrlImageUpload(($l->imagesArticle->first() ? $l->imagesArticle->first()->image : null)) }}" alt="">
                            </a>
                            <div class="l__a-article-content col-sm-8 col-7 p-3">
                                <a href="{{ route('post.detail', $l->slug) }}" >
                                    <h5 class="content-title text-split-2 {{ $l->featured == 1 ? 'color-red' : 'color-blue' }}">
                                        {!! checkVip($l->vip) !!}{{ $l->title }}
                                    </h5>
                                    <p class="content-price mb-0 text-split-2"><strong>
                                        <span>
                                        {{
                                            price_project($l->price, $l->acreage, $l->unit)['total_price'].' - '.$l->acreage .' m²'
                                        }},
                                        </span>
                                        <span style="    font-size: 0.8rem;">{{ $l->district->_prefix.' '.$l->district->_name.', '.$l->province->_name }}</span>
                                    </strong></p>
                                    <p class="content-desc text-split-2 mb-0"> {{ $l->sub_title }}</p>
                                </a>
                                <div class="content-footer d-flex justify-content-between align-items-center">
                                    <p class="mb-0 card-time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                                    <p class="mb-0 card-heart"><i class="fal fa-heart"></i></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-4 pt-3 filter-container">
            @include('pages.post.component._filter')
        </div>
    </div>
@endsection

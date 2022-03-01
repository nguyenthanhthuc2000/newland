@extends('layouts.master_layout')
@section('title', $title)
@section('main')
    <div class="detail-news">
        <div class="row content">
            <div class="col-md-9" >
                @php
                    $albums = json_decode($detail->album, true);
                @endphp
                @if(count($albums) > 0)
                    <div id="album" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $i = 0;

                            @endphp
                            @foreach($albums as $album)
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                    <img src="{{ getImageCrawl($album, 1)  }}" class="d-block w-100" alt="...">
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#album" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#album" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
                <h1 class="title mt-3">
                    {{ $detail->name }}
                </h1>
                <div class="dateandcat">
                    {{ date_format($detail->created_at, 'd/m/Y - H:i') }}
                </div>
                <p>
                    <i class="fal fa-map-marker-alt"></i>
                    Địa chỉ:
                    {{$detail->ward->_prefix.' '.$detail->ward->_name .', '.
                        $detail->district->_prefix.' '.$detail->district->_name .', '.
                        $detail->province->_prefix.' '.$detail->province->_name}}.
                    <a href="#">Xem trên bản đồ.</a>
                </p>
                @php
                    $extensions =   json_decode($detail->utilities, true);
                @endphp
                @if(count($extensions) > 0)
                <h3 class="mb-3">Tiện ích</h3>
                <div class="row">
                    @foreach($extensions as $extension)
                    <div class="col-md-6">
                        <p class="utilitie-project"> <span>{{ $extension }}</span></p>
                    </div>
                    @endforeach
                </div>
                @endif

                @php
                    $options = json_decode($detail->options, true);
                @endphp
                @if(count($options) > 0)
                <h3 class="mb-3">Tổng quan</h3>
                <div class="b__dt-ct-section-body">
                    @foreach($options as $option)

                        @foreach($option as $key => $val)
                            <div class="b__dt-ct-section-body-list">
                                <span class="title">{{ $key }}</span>
                                <span class="value">{{ $val }}</span>
                            </div>
                        @endforeach

                    @endforeach
                </div>
                @endif



                <div class="main-content" style="width: 100%;"> {!! $detail->content !!} </div>

                @php
                    $design_projects = json_decode($detail->design_project, true);
                @endphp
                @if(count($design_projects) > 0)
                    <h3 class="mb-3 mt-3">Thiết kế dự án</h3>
                    <div id="design_project" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $j = 0;

                            @endphp
                            @foreach($design_projects as $design_project)
                                <div class="carousel-item {{ $j == 0 ? 'active' : '' }}">
                                    <img src="{{ getImageCrawl($design_project, 1) }}" class="d-block w-100" alt="...">
                                </div>
                                @php
                                    $j++;
                                @endphp
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#design_project" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#design_project" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
                <div class="sourceandauthor text-end">
                    <p class="source">{{ $detail->author }}</p>
                    <p class="author">Nguồn: <a href="{{ $detail->source }}">{{ $detail->source }}</a></p>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
@endsection

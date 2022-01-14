@extends('layouts.master_layout')
@section('main')

{{ Breadcrumbs::render('personal-article') }}
<div class="list-article">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
            data-bs-target="#allArticle" type="button" role="tab" aria-controls="allArticle" aria-selected="true">Tất cả ({{ count($personalArticle) }})</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
            data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
            data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
    </ul>
    <div class="tab-content" id="personalArticle">
        <div class="tab-pane fade show active" id="allArticle" role="tabpanel" aria-labelledby="allArticle-tab">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đự án</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Ngày hết hạn</th>
                        <th scope="col">Thống kê</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personalArticle as $i => $art)
                    @php
                        $img_article[] = $art->imagesArticle->toArray();
                        $img = $img_article[0] ? 'articles/'.$img_article[0][0]['image'] : 'img/no_photo.jpg';
                    @endphp
                    <tr>
                        <th scope="row">{{ numericalOrder($i) }}</th>
                        <th>M001</th>
                        <td>
                            <div class="card card-article">
                                <div class="row g-0">
                                    <div class="col-md-4 card-img">
                                        <img src="{{ asset('images/'.$img) }}" class="img-fluid rounded-start" alt="{{ $art->title }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a class="card-title stretched-link" href="{{ $i }}">{{ $art->title }}</a>
                                            <p class="card-text">{{ $art->sub_title }}</p>
                                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
</div>
@endsection

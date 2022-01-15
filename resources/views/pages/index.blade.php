@extends('layouts.master_layout')
@section('main')
    <div class="box-article pt-5 pb-3">
        <div class="row">
            <div class="col-md-9 box-article__left">
                <div class="box-article-title d-flex" style="justify-content: space-between">
                    <h3 class="text-center text__title">Tin mới nhất</h3>
                    <a href="" class="view__more">Xem tất cả <i class="fal fa-arrow-right"></i></a>
                </div>
                <div class="box-article-content">
                    <div class="row">
                        <div class="col-md-7 mb-4 box-article__content">
                            <a href="{{route('post.detail', 'chi-tiet-bai-viet')}}">
                                <div class="img">
                                    <img class="w-100 box-article-content-img" src="{{asset('uploads/article/1.jpg')}}" alt="">
                                </div>
                                <h3 class="box-article-content-title">Nhà đất Cần Giuộc, Bến Lức “ăn theo” sức nóng khu Tây Nam TP.HCM</h3>
                                <p class="text-split-3 box-article-content-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Assumenda at delectus dignissimos dolores id ipsum praesentium, quidem quisquam.
                                    Aliquam asperiores atque facilis ipsam iusto nostrum perspiciatis placeat recusandae saepe vel!</p>
                                <div class="card__footer d-flex " style="justify-content: space-between; align-items: center">
                                    <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                                    <p class="mb-0 card__view">Xem chi tiết <i class="fal fa-arrow-right"></i></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5">
                            <ul style="padding-left: 0.5rem;" class="list__article">
                                <li class="article">
                                    <a class="article__title" href="">Giá bán tăng cao, căn hộ vừa túi tiền tiếp tục “mất tích” tại TP.HCM</a>
                                </li>
                                <li class="article">
                                    <a class="article__title" href="">Nhà đất Cần Giuộc, Bến Lức “ăn theo” sức nóng khu Tây Nam TP.HCM</a>
                                </li>
                                <li class="article">
                                    <a class="article__title" href="">[Cập nhật] Lãi suất ngân hàng vay mua nhà tháng 1/2022: Thấp nhất 5%/năm</a>
                                </li>
                                <li class="article">
                                    <a class="article__title" href="">Giá bán tăng cao, căn hộ vừa túi tiền tiếp tục “mất tích” tại TP.HCM</a>
                                </li>
                                <li class="article">
                                    <a class="article__title" href="">[Cập nhật] Lãi suất ngân hàng vay mua nhà tháng 1/2022: Thấp nhất 5%/năm</a>
                                </li>
                                <li class="article">
                                    <a class="article__title" href="">Giá bán tăng cao, căn hộ vừa túi tiền tiếp tục “mất tích” tại TP.HCM</a>
                                </li>
                                <li class="article">
                                    <a class="article__title" href="">[Cập nhật] Lãi suất ngân hàng vay mua nhà tháng 1/2022: Thấp nhất 5%/năm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3  box-article__right">
                <a href="">
                    <img class="w-100 banner-ads-top" src="{{asset('uploads/banner/bn2.jpg')}}" alt="">
                </a>
                &nbsp;
                <a href="">
                    <img class="w-100 banner-ads-top" src="{{asset('uploads/banner/bn2.jpg')}}" alt="">
                </a>
            </div>
        </div>
    </div>
    {{-- BẤT ĐỘNG SẢN CHO BẠN --}}
    <div class="box-product pt-2 pb-2">
        <div class="box-title d-flex pt-2 pb-2 justify-content-between align-items-center">
            <h3 class="text-center text__title">Bất động sản cho bạn</h3>
            <a href="">Xem thêm <i class="fal fa-arrow-right"></i></a>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-3 col-md-6 box__article mb-4">
                    @php
                        $img_article = [];
                        $img = '';
                        $img_article = $article->imagesArticle->toArray();
                        // var_dump($img_article);
                        $img = ( $img_article && $img_article[0]) ? 'articles/'.$img_article[0]['image'] : 'img/no_photo.jpg';
                    @endphp
                    <div class="card" >
                        <a href="" class="card-image{{ ($article->featured == 1) ? ' card-featured' : '' }}">
                            <img src="{{ asset('images/'.$img) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body card__article__body position-relative">
                            <h5 class="text-split-2 card__title"><a href="" class="stretched-link card-title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>{{ $article->title }}</a></h5>
                            <p class="card-text mb-0 text-split-1 card__price"><strong>{{ $article->price.' '.$article->unit.' - '.$article->acreage.' m²' }}</strong></p>
                            <p class="mb-0 text-split-1 card__address">{{ $article->address_on_post }}</p>
                        </div>
                        <div class="card__footer d-flex p-3 pt-0 justify-content-between align-items-center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> {{ $article->created_at->format('d/m/Y') }}</p>
                            <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="banner pt-4 pb-4">
        <a href="">
            <img class="w-100" src="{{asset('uploads/banner/bn1.jpg')}}" alt="">
        </a>
    </div>
    <div class="box-product pt-2 pb-2">
        <div class="box-title d-flex p-2" style="justify-content: space-between; align-items: center">
            <h3 class="text-center text__title">Tin nổi bật</h3>
            <a href="">Xem thêm <i class="fal fa-arrow-right"></i></a>
        </div>
        <div class="slick-nb">
            <div class="padding-article box__article mb-4">
                <div class="card" >
                    <a href="" class="card-image card-highlight">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <p class="card-text mb-0 text-split-1 card__price"><strong>12 triệu/m² - 100 m²</strong></p>
                        <p class="mb-0 text-split-1 card__address">Quận 3, Tp.Hồ Chí Minh</p>
                    </a>
                    <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                        <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                    </div>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card" >
                    <a href="" class="card-image card-highlight">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <p class="card-text mb-0 text-split-1 card__price"><strong>12 triệu/m² - 100 m²</strong></p>
                        <p class="mb-0 text-split-1 card__address">Quận 3, Tp.Hồ Chí Minh</p>
                    </a>
                    <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                        <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                    </div>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card" >
                    <a href="" class="card-image card-highlight">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <p class="card-text mb-0 text-split-1 card__price"><strong>12 triệu/m² - 100 m²</strong></p>
                        <p class="mb-0 text-split-1 card__address">Quận 3, Tp.Hồ Chí Minh</p>
                    </a>
                    <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                        <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                    </div>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card" >
                    <a href="" class="card-image card-highlight">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <p class="card-text mb-0 text-split-1 card__price"><strong>12 triệu/m² - 100 m²</strong></p>
                        <p class="mb-0 text-split-1 card__address">Quận 3, Tp.Hồ Chí Minh</p>
                    </a>
                    <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                        <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                    </div>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card" >
                    <a href="" class="card-image card-highlight">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <p class="card-text mb-0 text-split-1 card__price"><strong>12 triệu/m² - 100 m²</strong></p>
                        <p class="mb-0 text-split-1 card__address">Quận 3, Tp.Hồ Chí Minh</p>
                    </a>
                    <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                        <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                    </div>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card" >
                    <a href="" class="card-image card-highlight">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-top" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <p class="card-text mb-0 text-split-1 card__price"><strong>12 triệu/m² - 100 m²</strong></p>
                        <p class="mb-0 text-split-1 card__address">Quận 3, Tp.Hồ Chí Minh</p>
                    </a>
                    <div class="card__footer d-flex p-3 pt-0" style="justify-content: space-between; align-items: center">
                        <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                        <p class="mb-0"><i class="fas fa-heart card__heart active"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-post  pt-2 pb-2"  >
        <div class="box-title d-flex p-2  " style="justify-content: space-between; align-items: center">
            <h3 class="text-center text__title">Bài viết nổi bật</h3>
            <a href="" class="view-more">Xem thêm <i class="fal fa-arrow-right"></i></a>
        </div>
        <div class="slick-bv">
            <div class="padding-article box__article mb-4">
                <div class="card card-post" >
                    <a href=""  class="card-image">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-post" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title fw-bold">Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <div class="card__footer d-flex mt-3" style="justify-content: space-between; align-items: center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                            <p class="mb-0 card-view">Xem chi tiết <i class="fal fa-arrow-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card card-post" >
                    <a href=""  class="card-image">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-post" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title fw-bold">Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <div class="card__footer d-flex mt-3" style="justify-content: space-between; align-items: center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                            <p class="mb-0 card-view">Xem chi tiết <i class="fal fa-arrow-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card card-post" >
                    <a href=""  class="card-image">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-post" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title fw-bold">Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <div class="card__footer d-flex mt-3" style="justify-content: space-between; align-items: center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                            <p class="mb-0 card-view">Xem chi tiết <i class="fal fa-arrow-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="padding-article box__article mb-4">
                <div class="card card-post" >
                    <a href=""  class="card-image">
                        <img src="{{asset('/uploads/article/123.jpg')}}" class="card-img-post" alt="...">
                    </a>
                    <a class="card-body card__article__body" href="">
                        <h5 class="text-split-2 card__title fw-bold">Bán đất KDC Lộc Phát 2 - Ngay Trục (D30) kết nối 23/10 Với đại lộ Võ Nguyên Giáp - Sổ đỏ thổ cư.</h5>
                        <div class="card__footer d-flex mt-3" style="justify-content: space-between; align-items: center">
                            <p class="mb-0 card__time"><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                            <p class="mb-0 card-view">Xem chi tiết <i class="fal fa-arrow-right"></i></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- array(1) {
    [0]=> array(6) {
        ["id"]=> int(14)
        ["article_id"]=> int(17)
        ["image"]=> string(25) "2022_01_12_14_56_10_2.png"
        ["description_img"]=> NULL
        ["created_at"]=> string(27) "2022-01-12T14:56:10.000000Z"
        ["updated_at"]=> string(27) "2022-01-12T14:56:10.000000Z"
    }
} --}}

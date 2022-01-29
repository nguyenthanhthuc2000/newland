@extends('layouts.master_layout')
@section('title')
    {{ $detailArticle->title }}
@endsection
@section('main')
    <div class="row pt-4 pb-4 detail-post">
        <div class="col-md-1"></div>
        <div class="col-xl-8 col-12 pt-3 box__detail">

            <!-- Container for the image gallery -->
            <div class="container p-0 box__detail-album pb-3">

                <div class="slider-for">
                    @php
                        $qtyImg = count($detailArticle->imagesArticle);
                    @endphp
                    <!-- Full-width images with number text -->
                    @foreach ($detailArticle->imagesArticle as $i => $img)
                        <div class="mySlides">
                            @php  $i+=1; @endphp
                            <div class="numbertext">{{ $i.'/'.$qtyImg}}</div>
                            <img src="{{ getUrlImageUpload($img->image) }}"  style="width:100%">

                            <!-- Image text -->
                            <div class="caption-container">{{ $img->description_img }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Next and previous buttons -->
                {{-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a> --}}


                <!-- Thumbnail images -->
                <div class="row thumb-detail-post slider-nav" style="margin: auto; justify-content: center">
                    @foreach ($detailArticle->imagesArticle as $i => $img)
                        <div class="column thumb-detail-post__item">
                            <img class="demo cursor" src="{{ getUrlImageUpload($img->image) }}"  style="width:100%" data-index="{{ ++$i }}" alt="{{ $img->description_img }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="b__dt-ct pt-2">
                <h1 class="b__dt-ct-title">
                    <span>{{ $detailArticle->title.' - '.$detailArticle->phone_contact }}</span>
                </h1>
                <div class="card__footer d-flex " style="justify-content: space-between; align-items: center">
                    <p class="mb-0 "><i class="fal fa-calendar-alt"></i> {{ $detailArticle->created_at->format('d/m/Y') }}</p>
                    <p class="mb-0" style="cursor: pointer; font-size: 20px">
                        <i class="fal fa-share-alt"></i> &nbsp;
                        <i class="fal fa-heart card__heart"></i>
                    </p>
                    @if($detailArticle->status == 2)
                        <p class="alert-danger alert-status">Bài viết bị từ chối phê duyệt</p>
                    @elseif($detailArticle->status == 0)
                        <p class="alert-warning alert-status">Bài viết bị từ đang chờ xử lí</p>
                    @endif
                </div>
                <p class="mb-2 "><i class="fal fa-map-marker-alt"></i>&nbsp; {{ $detailArticle->address_on_post }}</p>

                <table class="b__dt-ct-short table" style="border: none">
                    <tbody>
                    <tr>
                        <td>Mức giá</td>
                        <td>Đường đi</td>
                        <td>Diện tích</td>
                        <td class="text-end {{ hidden_field($detailArticle->category->id) }}">Phòng</td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                {{
                                        price_project($detailArticle->price, $detailArticle->acreage, $detailArticle->unit)['total_price']
                                }}
                            </strong>
                        </td>
                        <td><strong>{{ $detailArticle->facade ? 'Mặt tiền: '.$detailArticle->facade.' m' : '' }}</strong></td>
                        <td><strong>{{ $detailArticle->acreage }} m²</strong></td>
                        <td class="text-end {{ hidden_field($detailArticle->category->id) }}">{{ $detailArticle->bedroom ? $detailArticle->bedroom : '0' }} phòng ngủ</td>
                    </tr>
                    <tr>
                        <td>
                            <span>
                                {{
                                    price_project($detailArticle->price, $detailArticle->acreage, $detailArticle->unit)['unit_price']
                                }}
                            </span>
                        </td>
                        <td><span>{{ $detailArticle->way ? 'Hẻm: '.$detailArticle->way.' m' : '' }}</span></td>
                        <td></td>
                        <td class="text-end {{ hidden_field($detailArticle->category->id) }}">{{ $detailArticle->toilet ? $detailArticle->toilet : '0' }} toilet</td>
                    </tr>
                    </tbody>
                </table>
                <div class="b__dt-ct-desc">
                    <h5 style="font-weight: bold">Thông tin chi tiết</h5>
                    <div class="box__dt-ct-desc-text">
                        {!! $detailArticle->content !!}
                    </div>
                </div>
                <br>
                <div class="b__dt-ct-section-body">
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Loại tin đăng:</span>
                        <span class="value">{{ $detailArticle->category->name }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Địa chỉ:</span>
                        <span class="value">{{ $detailArticle->address_on_post }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Mặt tiền:</span>
                        <span class="value">{{ $detailArticle->facade ? 'Mặt tiền: '.$detailArticle->facade.' m' : '' }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list {{ hidden_field($detailArticle->category->id) }}">
                        <span class="title">Số tầng:</span>
                        <span class="value">{{ $detailArticle->floor ? $detailArticle->floor.' tầng' : '0' }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list {{ hidden_field($detailArticle->category->id) }}">
                        <span class="title">Số phòng ngủ:</span>
                        <span class="value">{{ $detailArticle->bedroom ? $detailArticle->bedroom.' phòng ngủ' : '0' }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list {{ hidden_field($detailArticle->category->id) }}">
                        <span class="title">Nội thất:</span>
                        <span class="value">{{ $detailArticle->furniture }}</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Pháp lý:</span>
                        <span class="value">{{ $detailArticle->legal_documents }}</span>
                    </div>
                </div>
                <div class="b__dt-ct-desc mt-3">
                    <h5 style="font-weight: bold">Bản đồ</h5>
                    <div class="box__dt-ct-desc-text">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.51782664175!2d106.69916291462252!3d10.771594992324795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgdGh14bqtdCBDYW8gVGjhuq9uZw!5e0!3m2!1svi!2s!4v1642146351254!5m2!1svi!2s"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">

                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-12 pt-3">
            <div class="b__ct">
                <div class="b__ct-info">
                    <img class="b__ct-info-avt img-fluid" src="{{asset('/images/non_avatar.jpg')}}" alt="">

                        <p class="b__ct-info-name pt-3 mb-1"><strong>{{ ($detailArticle->user->name) }}</strong></p>
                        <a href="{{ route('article.SameEntrant', $detailArticle->user->id) }}" class="b__ct-info-article ">Xem thêm {{ $countArticleOfUser }} tin khác</a>
                </div>
                <div class="b__ct-contact">
                    <button class="b__ct-contact-btn b__ct-contact-phone" title="Sao chép" id="phone_contact" value="0389946423">
                        {{ $detailArticle->phone_contact }}
                        <p class="mb-0 text-center">Sao chép</p>
                    </button>
                    <br>
                    <a href="mailto:nguyenthanhthuc@gmail.com" class="b__ct-contact-btn b__ct-contact-mail">Gửi mail</a>
                    <br>
                    <button class="b__ct-contact-btn" data-bs-toggle="modal" data-bs-target="#contactModal">Yêu cầu liên hệ</button>
                </div>
            </div>

        </div>
        <div class="col-md-1"></div>
        <!-- Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="min-width: 35%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yêu cầu liên hệ</h5>
                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="frm-contact">
                            <input type="hidden" name="" id="article_id" value="{{ $detailArticle->id }}">
                            <p><strong>Thông tin liên hệ</strong></p>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" maxlength="32" placeholder="Họ và tên *">
                                <span class="text-danger d-none name-error">Vui lòng nhập tên</span>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" id="phone" maxlength="12" placeholder="Số điện thoại *">
                                <span class="text-danger d-none phone-error">Vui lòng nhập số điện thoại</span>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" maxlength="65" placeholder="Email *">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label"><strong>Nội dung</strong></label>
                                <textarea class="form-control" id="content" rows="3">Tôi cần tư vấn</textarea>
                            </div>
                            &nbsp;
                            <button type="button" class="btn btn-primary w-100 btn__send__contact"
                                    style="padding: 13px;">Gửi yêu cầu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $data = [
            'phone' => $detailArticle->phone_contact
        ];
    @endphp
    @include('pages.post.component._action_menu_mobile', $data)
@endsection


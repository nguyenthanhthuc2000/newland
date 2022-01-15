@extends('layouts.master_layout')
@section('main')
    <div class="row pt-4 pb-4 detail-post">
        <div class="col-md-1"></div>
        <div class="col-xl-8 pt-3 box__detail">

            <!-- Container for the image gallery -->
            <div class="container p-0 box__detail-album pb-3">

                <div class="slider-for">
                <!-- Full-width images with number text -->
                <div class="mySlides">
                    <div class="numbertext">1 / 6</div>
                    <img src="{{asset('uploads/article/123.jpg')}}"  style="width:100%">

                    <!-- Image text -->
                    <div class="caption-container">mô tả ảnh 1
                    </div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                    <img src="{{asset('uploads/article/3.jpg')}}"  style="width:100%">
                    <!-- Image text -->
                    <div class="caption-container">mô tả ảnh 2
                    </div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                    <img src="{{asset('uploads/article/4.jpg')}}"  style="width:100%">
                    <!-- Image text -->
                    <div class="caption-container">mô tả ảnh 3
                    </div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                    <img src="{{asset('uploads/article/5.jpg')}}"  style="width:100%">
                    <!-- Image text -->
                    <div class="caption-container">mô tả ảnh 4
                    </div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">5 / 6</div>
                    <img src="{{asset('uploads/article/3.jpg')}}"  style="width:100%">
                    <!-- Image text -->
                    <div class="caption-container">mô tả ảnh 5
                    </div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">6 / 6</div>
                    <img src="{{asset('uploads/article/4.jpg')}}"  style="width:100%">
                    <!-- Image text -->
                    <div class="caption-container">mô tả ảnh 6
                    </div>
                </div>
            </div>
                <!-- Next and previous buttons -->
                {{-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a> --}}


                <!-- Thumbnail images -->
                <div class="row thumb-detail-post slider-nav" style="margin: auto; justify-content: center">
                    <div class="column thumb-detail-post__item">
                        <img class="demo cursor" src="{{asset('uploads/article/2.jpg')}}"  style="width:100%" data-index="1" alt="The Woods">
                    </div>
                    <div class="column thumb-detail-post__item">
                        <img class="demo cursor" src="{{asset('uploads/article/3.jpg')}}"  style="width:100%" data-index="2" alt="Cinque Terre">
                    </div>
                    <div class="column thumb-detail-post__item">
                        <img class="demo cursor" src="{{asset('uploads/article/4.jpg')}}"  style="width:100%" data-index="3" alt="Mountains and fjords">
                    </div>
                    <div class="column thumb-detail-post__item">
                        <img class="demo cursor" src="{{asset('uploads/article/5.jpg')}}"  style="width:100%" data-index="4" alt="Northern Lights">
                    </div>
                    <div class="column thumb-detail-post__item">
                        <img class="demo cursor" src="{{asset('uploads/article/123.jpg')}}"  style="width:100%" data-index="5" alt="Cinque Terre">
                    </div>
                    <div class="column thumb-detail-post__item">
                        <img class="demo cursor" src="{{asset('uploads/article/4.jpg')}}"  style="width:100%" data-index="6" alt="Mountains and fjords">
                    </div>
                </div>
            </div>
            <div class="b__dt-ct pt-2">
                <h1 class="b__dt-ct-title">
                    <span>Bán tòa Homestay CC Mini 7 tầng Khương Hạ - 23 phòng full đồ - dòng tiền 120tr/th - 038 9946 423</span>
                </h1>
                <div class="card__footer d-flex " style="justify-content: space-between; align-items: center">
                    <p class="mb-0 "><i class="fal fa-calendar-alt"></i> 20/2/2022</p>
                    <p class="mb-0" style="cursor: pointer; font-size: 20px">
                        <i class="fal fa-share-alt"></i> &nbsp;
                        <i class="fal fa-heart card__heart"></i>
                    </p>
                </div>
                <p class="mb-2 "><i class="fal fa-map-marker-alt"></i>&nbsp; 138, Phố Khương Hạ, Phường Khương Đình, Thanh Xuân, Hà Nội</p>

                <table class="b__dt-ct-short table" style="border: none">
                    <tbody>
                    <tr>
                        <td>Mức giá</td>
                        <td>Đường đi</td>
                        <td>Diện tích</td>
                        <td class="text-end">Phòng</td>
                    </tr>
                    <tr>
                        <td><strong>15.8 tỷ</strong></td>
                        <td><strong>Mặt tiền 7.5 m</strong></td>
                        <td><strong>112 m²</strong></td>
                        <td class="text-end"><strong>23 PN</strong></td>
                    </tr>
                    <tr>
                        <td><span>~141.1 triệu/m²</span></td>
                        <td><span>Hẻm 112 m</span></td>
                        <td></td>
                        <td class="text-end">3 WC</td>
                    </tr>
                    </tbody>
                </table>
                <div class="b__dt-ct-desc">
                    <h5 style="font-weight: bold">Thông tin chi tiết</h5>
                    <div class="box__dt-ct-desc-text">
                        <p>+ Diện tích: 112m2. Mặt tiền 7,5m</p>
                        <p>+ Tòa nhà căn hộ dịch vụ 7 tầng thang máy, tổng 23 phòng, full nội thất.</p>
                        <p>Tầng 1: Nhà xe, thang máy, thang bộ, 01 phòng khép kín.</p>
                        <p>Tầng 7: 1 phòng khép kín + 1 Phòng to trong đó có 2 ngủ và 1 khách + sân phơi</p>
                        <p>+ Dòng tiền ổn định, doanh thu 120tr/tháng</p>
                    </div>
                </div>
                <br>
                <div class="b__dt-ct-section-body">
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Loại tin đăng:</span>
                        <span class="value">Bán nhà riêng</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Địa chỉ:</span>
                        <span class="value">Phố Khương Hạ, Phường Khương Đình, Thanh Xuân, Hà Nội</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Mặt tiền:</span>
                        <span class="value">7.5 m</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Số tầng:</span>
                        <span class="value">7 tầng</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Số phòng ngủ:</span>
                        <span class="value">23 phòng</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Nội thất:</span>
                        <span class="value">Nội thất đầy đủ</span>
                    </div>
                    <div class="b__dt-ct-section-body-list">
                        <span class="title">Pháp lý:</span>
                        <span class="value">Sổ đỏ/ Sổ hồng</span>
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
        <div class="col-md-2 pt-3">
            <div class="b__ct">
                <div class="b__ct-info">
                    <img class="b__ct-info-avt img-fluid" src="{{asset('/images/avatar.jpg')}}" alt="">

                        <p class="b__ct-info-name pt-3 mb-1"><strong>Nguyễn Thành Thức</strong></p>
                        <a href="" class="b__ct-info-article ">Xem thêm 13 tin khác</a>
                </div>
                <div class="b__ct-contact">
                    <button class="b__ct-contact-btn b__ct-contact-phone">038 9946 423</button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <p><strong>Thông tin liên hệ</strong></p>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" placeholder="Họ và tên *">
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" id="phone" placeholder="Số điện thoại *">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" placeholder="Email *">
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

@endsection


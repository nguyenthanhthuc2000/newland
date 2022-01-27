<footer class="footer ">
    <div class="container">
        <div class="row" style="align-items: center;">
            <div class="col-md-4 logo__foter p-2 d-flex" style="align-items: center">
                <a href="{{ route('home.index') }}" class="logo">
                    <img id="logo-footer" src="{{ getUrlImageUpload($settings ? $settings->logo : '', 'setting', 'nologo.jpg') }}" alt="">
                </a>
                <h5 class="p-3 logan">
                    <p class="m-0">{{ $settings ? $settings->logan : '' }}</p>
                </h5>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 col-6 d-flex p-2" style="align-items: center">
                        <i class="fal fa-headphones icon__footer"></i>
                        <div class="box__text">
                            <p class="mb-0 title__hotline">Hotline 1</p>
                            <p class="mb-0 text-black content__hotline"><strong> {{ $settings ? $settings->hotline_1 : '' }}</strong></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 d-flex p-2" style="align-items: center">
                        <i class="fal fa-phone-volume icon__footer"></i>
                        <div class="box__text">
                            <p class="mb-0 title__hotline">Hotline 2</p>
                            <p class="mb-0 text-black content__hotline"><strong> {{ $settings ? $settings->hotline_2 : '' }}</strong></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 d-flex p-2" style="align-items: center">
                        <i class="fal fa-user-md-chat icon__footer"></i>
                        <div class="box__text">
                            <p class="mb-0 title__hotline">Email</p>
                            <a href="mailto:hotro@newland.vn" class="mb-0 text-black content__hotline"><strong>{{ $settings ? $settings->email : '' }}</strong></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row  mt-3">
            <div class="col-md-4 mb-3">
                <h5 class="company__title">
                    {{ $settings ? $settings->name : '' }}
                </h5>
                <ul class="box__ul">
                    <li>
                        <a href="{{$settings ? $settings->google_map : '' }}">
                            <i class="fal fa-map-marker-alt"></i>
                            <span>
                        {{ $settings ? $settings->address : '' }}
                        </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5 class="company__title">
                            Hướng dẩn
                        </h5>
                        <ul class="box__article box__ul title_article">
                            <li><a href="">Báo giá & hỗ trợ</a></li>
                            <li><a href="">Câu hỏi thường gặp</a></li>
                            <li><a href="">Thông báo</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h5 class="company__title">
                            Qui định
                        </h5>
                        <ul class="box__article box__ul title_article">
                            <li><a href="">Báo giá & hỗ trợ</a></li>
                            <li><a href="">Câu hỏi thường gặp</a></li>
                            <li><a href="">Thông báo</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h5 class="company__title">
                    Đăng kí nhận tin
                </h5>
                <div class="box-input-group">
                    <input type="text" class="form-control input__border" placeholder="Nhập email của bạn" >
                    <span class="input-group-icon" style="display: block;margin-right: -6px;"><i class="fal fa-paper-plane"></i></span>
                </div>
                <ul class="social__network box__ul">
                    <li>
                        <a href="">
                            <img src="{{asset('/icons/youtube.svg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{asset('/icons/facebook.svg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{asset('/icons/zalo.svg')}}" alt="">
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="footer__bottom container">
        <hr type="color:#7f8c8d;">
        <p class="text-center m-0" style="font-size: 13px">Copyright © 2022 {{ $settings ? $settings->name : '' }}</p>
    </div>
</footer>

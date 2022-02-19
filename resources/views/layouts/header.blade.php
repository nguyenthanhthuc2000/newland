<header class="header navbar-light">
    <div class="container">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="logo">
                    <a class="navbar-brand" href="{{ route('home.index') }}"><img id="logo" src="{{ getUrlImageUpload($settings ? $settings->logo : '', 'setting', 'nologo.jpg') }}" alt=""></a>
                </div>
                <div class="d-flex" style="align-items: center">
                    <a href="#" class="favorite-product"><i class="fal fa-heart" style="font-size: 1.5rem; color: #7f8c8d;"></i></a>
                    <button class="filter-btn" type="button" >
                        <span class="open"><i class="fal fa-search" style="font-size: 1.4rem;color: #7f8c8d"></i></span>
                    </button> &nbsp;
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="    margin: auto;">
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle active" href="#" id="nha-dat-ban" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nhà đất bán
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="nha-dat-ban">
                                @foreach ($sell as $item)
                                    <li><a class="dropdown-item" href="{{route('category.index', $item->slug) }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle" href="#" id="nha-dat-cho-thue" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nhà đất cho thuê
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="nha-dat-cho-thue">
                                @foreach ($lease as $item)
                                    <li><a class="dropdown-item" href="{{route('category.index', $item->slug) }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hỗ trợ
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Tư vấn phong thủy</a></li>
                                <li><a class="dropdown-item" href="#">Dự tính chi phí làm nhà</a></li>
                                <li><a class="dropdown-item" href="#">Tính lãi suất</a></li>
                                <li><a class="dropdown-item" href="#">Xem tuổi làm nhà</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover " href="{{ route('project.index') }}" id="" >
                                Dự án
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover " href="{{ route('news.index') }}" id="" >
                                Tin tức
                            </a>
                        </li>
                    </ul>
                    <div class="box__auth">
                        <li>
                            <a href="#" class="favorite-produc-menu"><i class="fal fa-heart" style="font-size: 1.5rem; color: #7f8c8d;"></i></a>
                        </li>
                        &nbsp;
                        @if(Auth::check())
                            <li class="dropdown">
                                <a class="nav-link line__hover dropdown-toggle account__manage" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong>{{Auth::user()->name}}</strong>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li><a class="dropdown-item" href="{{ route('auth.info') }}"><i class="fas fa-id-card"></i> Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="{{ route('auth.article') }}"><i class="fas fa-newspaper"></i> Bài viết của bạn</a></li>
                                    <li><a class="dropdown-item" href="{{ route('auth.project') }}"><i class="fas fa-newspaper"></i> Dự án của bạn</a></li>
                                    @if(Auth::user()->facebook_id == null && Auth::user()->google_id == null)
                                    <li><a class="dropdown-item" href="{{ route('auth.change.password') }}"> Đổi mật khẩu</a></li>
                                    @endif
                                    @if(Auth::user()->level == 2 || Auth::user()->level == 1)
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"> Quản trị website</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('auth.get.logout') }}"> Đăng xuất</a></li>
                                </ul>
                            </li>
                        @else
                            <a  class="btn btn__re__line btn__auth"
                                href="{{ route('auth.get.login') }}"
                            >
                                Đăng nhập
                            </a> &nbsp;
                            <a  class="btn btn__re__line btn__auth"
                                href="{{ route('auth.get.register') }}"
                            >
                                Đăng kí
                            </a> &nbsp;
                        @endif
                        <a href="{{ Auth::check() ? route('post.index') : route('auth.get.login')}}" class="btn btn__outline__blue btn__auth" type="submit"
                        >
                            Đăng tin
                        </a>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

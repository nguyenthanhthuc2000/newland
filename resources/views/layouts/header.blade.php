<header class="header navbar-light">
    <div class="container">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="logo">
                    <a class="navbar-brand" href="{{ route('home.index') }}"><img id="logo" src="{{ asset('customer/image/logo.png') }}" alt=""></a>
                </div>
                <div class="d-flex">
                    <button class="filter-btn" type="button" >
                        <span class="open"><i class="fas fa-filter"></i></span>
                    </button> &nbsp;
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nhà đất bán
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nhà đất cho thuê
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nội - Ngoại thất
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link line__hover dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tin tức
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="box__auth">
                        @if(Auth::check())
                            <li class="dropdown">
                                <a class="nav-link line__hover dropdown-toggle account__manage" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong>{{Auth::user()->name}}</strong>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li><a class="dropdown-item" href="{{ route('auth.info') }}"><i class="fas fa-id-card"></i> Thông tin cá nhân</a></li>
                                    <li><a class="dropdown-item" href="{{ route('auth.article') }}"><i class="fas fa-newspaper"></i> Bài viết của bạn</a></li>
                                    @if(Auth::user()->facebook_id == null && Auth::user()->google_id == null)
                                    <li><a class="dropdown-item" href="{{ route('auth.change.password') }}"> Đổi mật khẩu</a></li>
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
<div class="filter ">
    <div class="container">
        <button class="filter-btn filter-btn-close" type="button" >
            <span class="close"><i class="fas fa-times" style="font-size: 1.4rem;"></i></span>
        </button>
        <form action="" id="frm-search">
            <h3 class="search__title d-none">Tìm kiếm</h3>
            <ul class="filter-nav">
                <li class="filter-item">
                    <a class="filter-link" ><span>Hình thức</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Danh mục</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Khu vực</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Mức giá</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
                <li class="filter-item">
                    <a class="filter-link" ><span>Diện tích</span></a>
                    <select class="form-select list__option" aria-label="Default select example">
                        <option selected>Tất cả</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </li>
            </ul>
            <div class="filter__btns">
                <i class="fal fa-sync btn__filter"></i>
                <button class="btn__filter btn__search">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>

@extends('layouts.master_layout')
@section('main')
    <div class="post-form-action col-md-6 col-12 mx-auto pt-5">
        <form action="{{ route('auth.post.register') }}" method="post" id="register_form" class="form-post" enctype="multipart/form-data">
            <div class="tab-info">
                    <h3 class="text-center mt-2 mb-3">ĐĂNG KÍ</h3>
                @if(session()->has('registerError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
                         style="justify-content: center">
                        <strong>{{ session()->get('registerError') }}</strong>
                    </div>
                @endif
                <div class="modal-body mt-2">
                    <p class="fw-bold">Thông tin đăng nhập</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="phone" maxlength="12" id="phone_register" placeholder="Số điện thoại *">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="password" class="form-control fa-icon" maxlength="12" name="password" id="password_register" placeholder="Mật khẩu *">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="password" class="form-control fa-icon" maxlength="12" name="password_confirm" id="password_confirm_register" placeholder="Mật khẩu xác nhận *">
                                            @error('password_confirm')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <span class="form-text text-danger d-none error_password_confirm">Sai mật khẩu xác nhận</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 text-center">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="file" name="avatar"  id="input_file_img" class="form-control" id="image" hidden>
                                            @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <div class="review-img">
                                                <img id="review-img" style="width: 150px; height:150px; border-radius: 50%; object-fit: cover; display: block;margin: auto; cursor: pointer" class="img-fluid" src="{{ getUrlImageUpload(null, null, 'non_avatar.jpg') }}">
                                                <small class="m-auto">Ảnh đại diện</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="fw-bold">Thông tin cá nhân</p>
                    <div class="mb-3">
                        <input type="email" class="form-control fa-icon" name="email" id="email_register" placeholder="Email *">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="name_register" placeholder="Họ và tên *">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="date" class="form-control" name="birthday" id="birthday_register">
                        @error('birthday')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-address">
                        <div class="dropdown mt-3">
                            <select placeholder="Tỉnh/ Thành phố" name="province" data-type="provinces" class="select-local form-select form-control">
                                <option disable value="">Tỉnh/ Thành phố</option>
                                @foreach ($province as $prov)
                                    <option value="{{ $prov->id }}" >{{ $prov->_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('province')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="dropdown mt-3">
                            <select placeholder="Tỉnh/ Thành phố" name="district" data-type="districts" class="select-local form-select form-control">
                                <option disable value="">Quận /  Huyện</option>
                            </select>
                        </div>
                        @error('district')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="dropdown mt-3">
                            <select placeholder="Tỉnh/ Thành phố" name="ward" data-type="wards" class="select-local form-select form-control">
                                <option disable value="">Phường / xã</option>
                            </select>
                        </div>
                        @error('ward')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control fa-icon" id="card_id" name="card_id" placeholder="CMND/CCCD *">
                        @error('card_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="nam" value="1" checked>
                                <label class="form-check-label" for="nam">
                                    Nam
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="nu" name="sex"  value="0">
                                <label class="form-check-label" for="nu">
                                    Nữ
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="khac" name="sex"  value="2">
                                <label class="form-check-label" for="khac">
                                    Khác
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="account_type" id="canhan" value="0" checked>
                                <label class="form-check-label" for="canhan">
                                    Cá nhân
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="congty" name="account_type"  value="2">
                                <label class="form-check-label" for="congty">
                                    Công ty
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="regulation_confirm">
                        <label class="form-check-label" for="regulation_confirm">
                            Tôi đồng ý với các <a href="">điều khoản, điều kiện</a> & <a href="">chính sách</a> của NewLand
                        </label>
                        <p class="text-danger d-none error_regulation_confirm">Vui lòng đồng ý với điều khoản của chúng tôi!</p>
                    </div>
                    <div class="mb-3">
                        <button style="" type="button"
                                class="btn btn-primary w-100 pb-2 pt-2 btn-register">Đăng kí
                        </button>
                    </div>
                    <div class="box-notification-register">
                        <p><strong>Chú ý</strong>:
                            <span class="text-primary">
                        Thông tin email đăng nhập không thể thay đổi sau khi đăng ký.
                    </span>
                        </p>
                        <p>Để được trợ giúp, vui lòng liên hệ tổng đài CSKH <span class="text-primary">1900 19001</span> hoặc email
                            <span class="text-primary">hotro@newland.vn</span>
                        </p>
                        <p class="text-center mb-0">Đã có tài khoản? <a href="{{ route('auth.get.login') }}" class="text-primary fw-bold">Đăng nhập</a> tại đây.</p>
                    </div>
                </div>

            </div>
            @csrf
        </form>
    </div>
@endsection

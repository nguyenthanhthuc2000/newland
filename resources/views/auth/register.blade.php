@extends('index')
@section('main')
    <div class="post-form-action col-md-6 col-12 mx-auto pt-3">
        <form action="{{ route('auth.post.register') }}" method="post" id="register_form">
            @csrf
            <div class="modal-body mt-2">
                <p class="fw-bold">Thông tin đăng nhập</p>
                <div class="mb-3">
                    <input type="text" class="form-control" name="phone" maxlength="12" id="phone_register" placeholder="Số điện thoại *">
                    <span class="form-text text-danger d-none error_phone_register">Không được bỏ trống</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="password" class="form-control fa-icon" maxlength="12" name="password" id="password_register" placeholder="Mật khẩu *">
                            <span class="form-text text-danger d-none error_password_register">Không được bỏ trống</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="password" class="form-control fa-icon" maxlength="12" name="password_confirm" id="password_confirm_register" placeholder="Mật khẩu xác nhận *">
                            <span class="form-text text-danger d-none error_password_confirm_register">Không được bỏ trống</span>
                            <span class="form-text text-danger d-none error_password_confirm">Sai mật khẩu xác nhận</span>
                        </div>
                    </div>
                </div>
                <p class="fw-bold">Thông tin cá nhân</p>
                <div class="mb-3">
                    <input type="email" class="form-control fa-icon" name="email" id="email_register" placeholder="Email *">
                    <span class="form-text text-danger d-none error_email_register">Không được bỏ trống</span>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="name_register" placeholder="Họ và tên *">
                    <span class="form-text text-danger d-none error_name_register">Không được bỏ trống</span>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" name="birthday" id="birthday_register">
                    <span class="form-text text-danger d-none error_birthday_register">Không được bỏ trống</span>
                </div>
                <div class="modal-address">
                    <div class="dropdown mt-3">
                        <input placeholder="Tỉnh / Thành phố" class="form-control dropdown-toggle input-datalist province_register" type="text" id="dropdownModalProvinces"
                               data-bs-toggle="dropdown" aria-expanded="false" value="" name="province" autocomplete="off">
                        <ul class="dropdown-menu" aria-labelledby="dropdownModalProvinces" datalist="dropdownModalProvinces" data-type="province">
                            @foreach ($province as $prov)
                                <li value="{{ $prov->id }}">{{ $prov->_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <span class="form-text text-danger d-none error_province_register mb-3">Không được bỏ trống</span>
                    <div class="dropdown mt-3">
                        <input placeholder="Quận/ Huyện" class="form-control dropdown-toggle input-datalist district_register" type="text" id="dropdownModalDistricts"
                               data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                        <ul class="dropdown-menu" aria-labelledby="dropdownModalDistricts" datalist="dropdownModalDistricts" data-type="districts">

                        </ul>
                    </div>
                    <span class="form-text text-danger d-none error_district_register mb-3">Không được bỏ trống</span>
                    <div class="dropdown mt-3">
                        <input placeholder="Phường / Xã" class="form-control dropdown-toggle input-datalist ward_register" type="text" id="dropdownModalWards"
                               data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                        <ul class="dropdown-menu" aria-labelledby="dropdownModalWards" datalist="dropdownModalWards" data-type="wards">

                        </ul>
                    </div>
                    <span class="form-text text-danger d-none error_ward_register mb-3">Không được bỏ trống</span>
                </div>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control fa-icon" id="card_id" name="card_id" placeholder="CMND/CCCD *">
                    <span class="form-text text-danger d-none error_card_id">Không được bỏ trống</span>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex"  value="1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex"  value="0" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="regulation_confirm">
                    <label class="form-check-label" for="regulation_confirm">
                        Tôi đồng ý với các <a href="">điều khoản, điều kiện</a> & <a href="">chính sách</a> của NewLand
                    </label>
                    <span class="form-text text-danger d-none error_regulation_confirm">Không được bỏ trống</span>
                </div>
                <div class="mb-3">
                    <button style=""
                            class="btn btn-primary w-100 pb-2 pt-2">Đăng kí
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
                    <p class="text-center mb-0">Đã có tài khoản? <span class="text-primary fw-bold">Đăng nhập</span> tại đây.</p>
                </div>
            </div>
        </form>
    </div>
@endsection

<!-- Đăng nhập -->
<div class="modal fade" id="mLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Đăng nhập hệ thống</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="email" class="form-control fa-icon" id="email" placeholder="Số điện thoại đăng nhập">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control fa-icon" id="password" placeholder="Mật khẩu">
                </div>
                <div class="mb-3">
                    <button type="button"
                            class="btn btn-primary w-100 pb-2 pt-2">Đăng nhập
                    </button>
                </div>
                <div class="box__login__helper d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Lưu đăng nhập
                        </label>
                    </div>
                    <a href="" class="text-danger">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Đăng nhập -->
<div class="modal fade" id="mRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Đăng kí tài khoản</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold">Thông tin đăng nhập</p>
                <div class="mb-3">
                    <input type="email" class="form-control fa-icon" id="email" placeholder="Email *">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control fa-icon" id="password" placeholder="Mật khẩu *">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="password" class="form-control fa-icon" id="password" placeholder="Mật khẩu *">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <input type="password" class="form-control fa-icon" id="password" placeholder="Mật khẩu xác nhận *">
                        </div>
                    </div>
                </div>
                <p class="fw-bold">Thông tin cá nhân</p>
                <div class="mb-3">
                    <input type="number" class="form-control fa-icon" id="phone" placeholder="Số điện thoại *">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control fa-icon" id="email" placeholder="Họ và tên *">
                </div>
                <select class="form-select mb-3 form-control" aria-label="Default select example">
                    <option selected>Tỉnh/TP *</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select mb-3 form-control" aria-label="Default select example">
                    <option selected>Quận/Huyện *</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select mb-3 form-control" aria-label="Default select example">
                    <option selected>Phường/Xã/Thị trấn *</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="mb-3">
                    <input type="text" class="form-control fa-icon" id="email" placeholder="CMND/CCCD *">
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Nam
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Tôi đồng ý với các <a href="">điều khoản, điều kiện</a> & <a href="">chính sách</a> của NewLand
                    </label>
                </div>
                <div class="mb-3">
                    <button type="button" style=""
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
        </div>
    </div>
</div>

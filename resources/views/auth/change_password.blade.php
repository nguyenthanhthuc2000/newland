@extends('layouts.master_layout')
@section('main')
    <div class="post-form-action col-md-6 col-12 mx-auto pt-5">
            <h3 class="text-center">ĐỔI MẬT KHẨU</h3>
        <form action="{{ route('auth.update.password') }}" method="post" id="register_form">
            @csrf
            @if(session()->has('updatePasswordError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                     style="justify-content: center">
                    <strong>{{ session()->get('updatePasswordError') }}</strong>
                </div>
            @endif
            <div class="modal-body mt-2">
                <p class="fw-bold">Thông tin đăng nhập</p>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="password" class="form-control fa-icon" maxlength="12" name="password_old" id="password_register" placeholder="Mật khẩu cũ *">
                            @error('password_old')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <input type="password" class="form-control fa-icon" maxlength="12" name="password_new" id="password_register" placeholder="Mật khẩu mới *">
                            @error('password_new')
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
                <div class="mb-3">
                    <button style="" type="button"
                            class="btn btn-primary w-100 pb-2 pt-2 btn-register">Lưu
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

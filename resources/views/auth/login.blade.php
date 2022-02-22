@extends('layouts.master_layout')
@section('main')
    <div class="post-form-action col-md-5 col-12 mx-auto pt-5">
        <form action="{{ route('auth.post.login') }}" method="post" class="form-post">
            @csrf
            <div class="tab-info">
                <h3 class="text-center mt-2 mb-3">ĐĂNG NHẬP</h3>
                <div class="modal-body mt-2">
                @if(session()->has('updatePasswordSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                         style="justify-content: center">
                        <strong>{{ session()->get('updatePasswordSuccess') }}</strong>
                    </div>
                @endif
                @if(session()->has('errorLogin'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert"
                         style="justify-content: center">
                        <strong>{{ session()->get('errorLogin') }}</strong>
                    </div>
                @endif
                @if(session()->has('registerSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                         style="justify-content: center">
                        <strong>{{ session()->get('registerSuccess') }}</strong>
                    </div>
                @endif
                <label for="phone" class="form-label">Tài khoản<span class="text-danger">*</span></label>
                <div class="mb-3">
                    <input type="text" id="phone" class="form-control fa-icon" name="phone" placeholder="Nhập số điện thoại">
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <label for="password" class="form-label">Mật khẩu<span class="text-danger">*</span></label>
                <div class="mb-3">
                    <input type="password" id="password" class="form-control fa-icon" name="password" placeholder="Nhập mật khẩu">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button
                            class="btn btn-primary w-100 pb-2 pt-2">Đăng nhập
                    </button>
                </div>
                <div class="box__login__helper d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Lưu đăng nhập
                        </label>
                    </div>
                    <a href="" class="text-danger">Quên mật khẩu?</a>
                </div>
                    <br>
{{--                <p class="text-center">Hoặc</p>--}}
{{--                <div class="row mb-3">--}}
{{--                    <div class="col-6">--}}
{{--                        <div class="mb-3">--}}
{{--                            <a href="{{route('facebook.login')}}"--}}
{{--                                    class="btn w-100 pb-3 pt-3 btn__border"><i class="fab fa-facebook text-primary"></i> &nbsp; Facebook--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <div class="mb-3">--}}
{{--                            <a href="{{ route('google.login') }}"--}}
{{--                                    class="btn w-100 pb-3 pt-3 btn__border"><i class="fab fa-google-plus-g text-danger"></i> &nbsp; Google--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <p class="text-center mb-0">Đã chưa có tài khoản? <a class="text-primary fw-bold" href="{{ route('auth.get.register') }}">Đăng kí</a> tại đây.</p>

            </div>
            </div>
        </form>
    </div>
    <br>
@endsection

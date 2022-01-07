@extends('layouts.master_layout')
@section('main')
    <div class="post-form-action col-md-6 col-12 mx-auto pt-5">
        <h3 class="text-center">THÔNG TIN CÁ NHÂN</h3>
        <form action="{{ route('auth.post.update') }}" method="post">
            @csrf
            @if(session()->has('updateError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                     style="justify-content: center">
                    <strong>{{ session()->get('updateError') }}</strong>
                </div>
            @endif
            @if(session()->has('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"
                     style="justify-content: center">
                    <strong>{{ session()->get('updateSuccess') }}</strong>
                </div>
            @endif
            <div class="modal-body mt-2">
                <p class="fw-bold">Thông tin cá nhân</p>
                <div class="mb-3">
                    <label for="name" class="form-label">Số điện thoại <span style="color: red">*</span></label>
                    <input type="number" class="form-control fa-icon" value="{{$info->phone}}" id="name" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Địa chỉ email <span style="color: red">*</span></label>
                    <input type="email" class="form-control fa-icon" name="email" value="{{$info->email}}" id="email" placeholder="Email *">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{$info->name}}" id="name" placeholder="Họ và tên *">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Ngày sinh <span style="color: red">*</span></label>
                    <input type="date" class="form-control" name="birthday" value="{{$info->birthday}}" id="birthdayr">
                    @error('birthday')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-address">
                    <div class="dropdown mt-3">
                        <label for="province" class="form-label">Tỉnh/ Thành phố<span style="color: red">*</span></label>
                        <select name="province" data-type="provinces" id="provinces" class="select-local form-select form-control" >
                            <option disable value="">Chọn</option>
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}" {{$info->province_id == $prov->id ? 'selected' : ''}}>{{ $prov->_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('province')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="dropdown mt-3">
                        <label for="districts" class="form-label">Quận/ Huyện<span style="color: red">*</span></label>
                        <select name="district" id="districts" data-type="districts" class="select-local form-select form-control">
                            <option disable value="">Chọn</option>
                            @foreach ($info->districts as $val)
                                <option value="{{ $val->id }}" {{$info->district_id == $val->id ? 'selected' : ''}}>{{ $val->_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('district')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="dropdown mt-3">
                        <label for="wards" class="form-label">Phường/ Xã/ Thị trấn <span style="color: red">*</span></label>
                        <select name="ward" data-type="wards" id="wards" class="select-local form-select form-control">
                            <option disable value="">Chọn</option>
                            @foreach ($info->wards as $val)
                                <option value="{{ $val->id }}" {{$info->ward_id == $val->id ? 'selected' : ''}}>{{ $val->_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('ward')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                    <label for="card_id" class="form-label">CMND/CCCD <span style="color: red">*</span></label>
                    <input type="text" class="form-control fa-icon" id="card_id" value="{{$info->card_id}}" name="card_id" placeholder="CMND/CCCD *">
                    @error('card_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="nam" value="1" {{$info->sex == 1 ? 'checked':''}}>
                            <label class="form-check-label" for="nam">
                                Nam
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="nu" name="sex"  value="0" {{$info->sex == 0 ? 'checked':''}}>
                            <label class="form-check-label" for="nu">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="khac" name="sex"  value="2" {{$info->sex == 2 ? 'checked':''}}>
                            <label class="form-check-label" for="khac">
                                Khác
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button
                            class="btn btn-primary w-100 pb-2 pt-2 ">Cập nhật
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
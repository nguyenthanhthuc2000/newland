@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6">
        </div>
        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="masonry-item col-md-12 mb-3">
            <div class="bgc-white p-20 bd">
                <div class="d-flex" style="justify-content: space-between">
                    <h6 class="c-grey-900">Thông tin website</h6>
                    <div style="text-align: end;">
                        <button type="submit" class="btn btn-primary btn-color btn__border">Cập nhật</button>
                    </div>
                </div>
                <div class="mT-30">
                        <div class="row">
                            @include('admin.layouts.alert')
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="name">Tên công ty</label>
                                <input type="text" class="form-control"  value="{{$settingsWeb->name}}" name="name" id="name">
                                @error('name')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="address">Địa chỉ</label>
                                <input type="text" class="form-control" value="{{$settingsWeb->address}}" name="address" id="address">
                                @error('address')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="hotline_1">Hotline 1</label>
                                <input type="number" maxlength="12" class="form-control" value="{{$settingsWeb->hotline_1}}" name="hotline_1" id="hotline_1">
                                @error('hotline_1')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="hotline_2">Hotline 2</label>
                                <input type="number" maxlength="12" class="form-control" value="{{$settingsWeb->hotline_2}}" name="hotline_2" id="hotline_2">
                                @error('hotline_2')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="email">Email CSKH</label>
                                <input type="email" class="form-control"  value="{{$settingsWeb->email}}" name="email" id="email">
                                @error('email')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="zalo">Zalo</label>
                                <input type="number" class="form-control" value="{{$settingsWeb->zalo}}" name="zalo" id="zalo">
                                @error('zalo')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input type="text" class="form-control" value="{{$settingsWeb->facebook}}" name="facebook" id="facebook">
                                @error('facebook')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="youtube">Youtube</label>
                                <input type="text" class="form-control" value="{{$settingsWeb->youtube}}" name="youtube" id="youtube">
                                @error('youtube')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="google_map">Google Map</label>
                            <input type="text" class="form-control" value="{{$settingsWeb->google_map}}" name="google_map" id="google_map">
                            @error('google_map')
                            <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-2">
                                <label class="form-label" for="logo">Logo Header</label>
                                <input type="file"  id="input_file_img" name="logo" hidden>
                                <div class="review-img">
                                    <img id="review-img" class="img-fluid" src="{{ asset('uploads/setting/'.$settingsWeb->logo) }}">
                                </div>
                                @error('logo')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-2">
                                <label class="form-label" for="logo_footer">Logo Footer</label>
                                <input type="file"  id="input_file_img_footer" name="logo_footer" hidden>
                                <div class="review-img-footer">
                                    <img id="review-img-footer" class="img-fluid" src="{{ asset('uploads/setting/'.$settingsWeb->logo_footer) }}">
                                </div>
                                @error('logo_footer')
                                <span class="error " style="    font-size: small; color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary btn-color btn__border">Cập nhật</button>
                        </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
    </script>
@endpush

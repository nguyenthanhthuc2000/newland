@extends('index')
@section('main')
<div class="post-form-action col-8 mx-auto pt-3">
    <form method="post" action="" class="form-post">
        @csrf
        <div class="tab-info basic-information">
            <div class="title">Thông tin cơ bản</div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Loại bất động sản <span class="text-required">*</span></label>
                <select class="form-select" aria-label="Default select example" id="typeOfRealEstate" aria-describedby="typeOfRealEstateHelp" placeholder="VD: Nhà riếng">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <div class="specific-address row">
                    <div class="col-6">
                        <label for="provinces" class="form-label">Tỉnh / Thành phố <span class="text-required">*</span></label>
                        <div class="dropdown">
                            <input placeholder="Tỉnh / Thành phố" class="form-control dropdown-toggle input-datalist" type="text" id="dropdownProvinces"
                                    data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                            <ul class="dropdown-menu" aria-labelledby="dropdownProvinces" datalist="dropdownProvinces" data-type="province">
                                @foreach ($province as $prov)
                                        <li value="{{ $prov->id }}">{{ $prov->_name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Quận/ Huyện <span class="text-required">*</span></label>
                        <div class="dropdown">
                        <input placeholder="Quận/ Huyện" class="form-control dropdown-toggle input-datalist" type="text" id="dropdownDistricts"
                                data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                            <ul class="dropdown-menu" aria-labelledby="dropdownDistricts" datalist="dropdownDistricts" data-type="districts">

                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Phường / Xã <span class="text-required">*</span></label>
                        <div class="dropdown">
                        <input placeholder="Phường / Xã" class="form-control dropdown-toggle input-datalist" type="text" id="dropdownWards"
                                data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                            <ul class="dropdown-menu" aria-labelledby="dropdownWards" datalist="dropdownWards" data-type="wards">

                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Đường <span class="text-required">*</span></label>
                        <div class="dropdown">
                            <input placeholder="Đường" class="form-control dropdown-toggle input-datalist" type="text" id="dropdownStreet"
                                    data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                                <ul class="dropdown-menu" aria-labelledby="dropdownStreet" datalist="dropdownStreet" data-type="streets">

                                </ul>
                            </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Dự án</label>
                <select class="form-select" aria-label="Default select example" id="typeOfRealEstate" aria-describedby="typeOfRealEstateHelp" placeholder="VD: Nhà riếng">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Địa chỉ hiển thị trên tin đăng <span class="text-required">*</span></label>
                <select class="form-select" aria-label="Default select example" id="typeOfRealEstate" aria-describedby="typeOfRealEstateHelp" placeholder="VD: Nhà riếng">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Vị trí trên bản đồ</label>
                <div class="map"></div>
            </div>
        </div>
        <div class="tab-info post-information">
            <div class="title">Thông tin bài viét</div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Tiêu đề <span class="text-required">*</span></label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="title" rows="2"></textarea>
                    <label for="title" class="floating">Tiêu đề</label>
                </div>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Mô tả ngắn <span class="text-required">*</span></label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="description" rows="3"></textarea>
                    <label for="description" class="floating">Mô tả ngắn</label>
                </div>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>

            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Mô tả chi tiết <span class="text-required">*</span></label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="description" rows="5"></textarea>
                    <label for="description" class="floating">Mô tả chi tiết</label>
                </div>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
        </div>
        <div class="tab-info real-estate-information">
            <div class="title">Thông tin bất đọng sản</div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Loại bất động sản <span class="text-required">*</span></label>
                <select class="form-select" aria-label="Default select example" id="typeOfRealEstate" aria-describedby="typeOfRealEstateHelp" placeholder="VD: Nhà riếng">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Loại bất động sản <span class="text-required">*</span></label>
                <div class="price row">
                    <div class="col-10">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Trường không được bỏ trống</div>
                    </div>
                    <div class="col-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                </div>
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Giấy tờ pháp lý <span class="text-required">*</span></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Default radio
                    </label>
                  </div>
            </div>
            <div class="mb-3">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label for="inputPassword6" class="col-form-label">Số phòng ngủ</label>
                    </div>
                    <div class="col-auto">
                      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-auto">
                      <span id="passwordHelpInline" class="form-text">
                        Must be 8-20 characters long.
                      </span>
                    </div>
                  </div>
            </div>
            <div class="mb-3">

            <div class="mb-3">
                <label for="specific-address" class="form-label">Địa chỉ</label>
                <div class="specific-address row">
                    <div class="col-6">
                        <label for="districts" class="form-label">Tỉnh / Thành phố <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Quận/ Huyện <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Xã / Thị trấn <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Đường <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="typeOfRealEstate" class="form-label">Loại bất động sản <span class="text-required">*</span></label>
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
            </div>
            </div>
        </div>
        <div class="tab-info image-video">
            <div class="title">Thông tin bất đọng sản</div>
            <p>Hãy dùng ảnh thật, không trùng, không chèn số điện thoại. Mỗi ảnh kích thước tối thiểu 400x400, tối đa 15 MB. Số lượng ảnh tối đa tuỳ theo loại tin. Xem thêm Quy định đăng tin.</p>
        </div>
        <div class="tab-infor contact">
            <div class="title">Thông tin bất đọng sản</div>
            <div class="mb-3">
                <label for="specific-address" class="form-label">Địa chỉ</label>
                <div class="specific-address row">
                    <div class="col-6">
                        <label for="districts" class="form-label">Tỉnh / Thành phố <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Quận/ Huyện <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Xã / Thị trấn <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                    <div class="col-6">
                        <label for="districts" class="form-label">Đường <span class="text-required">*</span></label>
                        <input type="text" class="form-control districts" list="">
                        {{-- <datalist id="districts" class="form-datalist">
                            @foreach ($province as $prov)
                                <option value="{{ $prov->id }}">
                            @endforeach
                        </datalist> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection

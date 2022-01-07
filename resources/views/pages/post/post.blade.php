@extends('layouts.master_layout')
@section('main')
<div class="post-form-action col-md-8 col-12 mx-auto pt-3">
    <form method="post" action="{{ route('post.article') }}" class="form-post" id="formPost">
        @csrf
        <div class="form-body">
            <div class="tab-info basic-information">
                <div class="title">Thông tin cơ bản</div>
                <div class="mb3 type-post">
                    <div class="form-check">
                        <input class="type-post-input" type="radio" name="typePost" id="sell" data-type="0" checked hidden>
                        <label class="form-check-label" for="sell">
                            Bán
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="type-post-input" type="radio" name="typePost" id="lease" data-type="1" hidden data-type="">
                        <label class="form-check-label" for="lease">
                            Cho thuê
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Loại bất động sản <span class="text-required">*</span></label>
                    <select class="form-select" aria-label="Default select example" id="typeOfRealEstate" aria-describedby="typeOfRealEstateHelp" name="typeOfRealEstate">
                        <option selected disable>Loại bất động sản</option>
                        @foreach($cat as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <div class="specific-address row">
                        <div class="col-6">
                            <label for="provinces" class="form-label">Tỉnh / Thành phố <span class="text-required">*</span></label>
                                <select placeholder="Tỉnh/ Thành phố" name="province" data-type="provinces" class="select-local form-control">
                                    <option disable value="">Tỉnh/ Thành phố</option>
                                    @foreach ($province as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Quận/ Huyện <span class="text-required">*</span></label>
                            <select name="district" data-type="districts" class="select-local form-control">
                                <option disable value="">Quận /  Huyện</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Phường / Xã <span class="text-required">*</span></label>
                            <select placeholder="Tỉnh/ Thành phố" name="ward" data-type="wards" class="select-local form-control">
                                <option disable value="">Phường / xã</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Đường <span class="text-required">*</span></label>
                            <input placeholder="Đường" class="form-control dropdown-toggle input-datalist" type="text" id="dropdownStreet"
                                    data-bs-toggle="dropdown" aria-expanded="false" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Địa chỉ hiển thị trên tin đăng <span class="text-required">*</span></label>
                    <input type="text" class="form-control" placeholder="Bạn có thể bổ sung hẻm, ngách, ngõ...">
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Vị trí trên bản đồ</label>
                    <div class="map"></div>
                </div>
            </div>
            <div class="tab-info post-information">
                <div class="title">Thông tin bài viết</div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Tiêu đề <span class="text-required">*</span></label>
                    <div class="form-input">
                        <textarea class="form-control" placeholder="VD: Bán nhà riêng 50m2 chính chủ tại Cầu Giấy" name="title" rows="2"></textarea>
                    </div>
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Mô tả ngắn <span class="text-required">*</span></label>
                    <div class="form-input">
                        <textarea class="form-control" placeholder="Nhập mô tả ngắn về bất động sản của bạn." name="sub-title" rows="3"></textarea>
                    </div>
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>

                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Mô tả chi tiết <span class="text-required">*</span></label>
                    <div class="form-input">
                        <textarea class="form-control" placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi, gần công viên, gần trường học,..." name="description" rows="5"></textarea>
                    </div>
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
            </div>
            <div class="tab-info real-estate-information">
                <div class="title">Thông tin bất động sản</div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Diện tích <span class="text-required">*</span></label>
                    <div class="acreage">
                        <input type="text" class="form-control" placeholder="Nhập diện tích, VD 80" unit="m²">
                    </div>
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Mức giá <span class="text-required">*</span></label>
                    <div class="price row">
                        <div class="col-9">
                            <input type="number" class="form-control price" aria-describedby="priceHelp">
                        </div>
                        <div class="col-3">
                            <select class="form-select" aria-label="" name="unit">
                                <option selected disable>Đơn vị</option>
                                <option value="1">VNĐ</option>
                                <option value="2">Giá / m²</option>
                                <option value="3">THỏa thuận</option>
                            </select>
                        </div>
                    </div>
                    <div id="typeOfRealEstateHelp" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
                <div class="mb-3">
                    <label for="legal_documents" class="form-label">Giấy tờ pháp lý <span class="text-required">*</span></label>
                    <input type="text" class="form-control legal_documents" placeholder="Giấy tờ pháp lý">
                </div>
                <div class="mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-10">
                        <label for="inputPassword6" class="col-form-label">Số phòng ngủ</label>
                        </div>
                        <div class="col-2">
                            <div class="input-group input-group-step">
                                <span class="input-group-btn">
                                    <button type="button" class=" btn-step"  data-type="minus" data-field="number_of_rooms">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="number_of_rooms" class="form-control input-step" value="0" min="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-step" data-type="plus" data-field="number_of_rooms">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-10">
                        <label for="inputPassword6" class="col-form-label">Số phòng tắm, vệ sinh</label>
                        </div>
                        <div class="col-2">
                            <div class="input-group input-group-step">
                                <span class="input-group-btn">
                                    <button type="button" class=" btn-step"  data-type="minus" data-field="number_of_rooms">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="number_of_rooms" class="form-control input-step" value="0" min="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-step" data-type="plus" data-field="number_of_rooms">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-10">
                        <label for="inputPassword6" class="col-form-label">Số tầng</label>
                        </div>
                        <div class="col-2">
                            <div class="input-group input-group-step">
                                <span class="input-group-btn">
                                    <button type="button" class=" btn-step"  data-type="minus" data-field="number_of_rooms">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="number_of_rooms" class="form-control input-step" value="0" min="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-step" data-type="plus" data-field="number_of_rooms">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="sub-title">
                        <span>Mô tả bổ sung</span>
                        <div class="line"></div>
                    </div>

                </div>
                <div class="mb-3">
                    <div class="direction-address row">
                        <div class="col-6">
                            <label for="districts" class="form-label">Hướng nhà</label>
                            <input type="text" class="form-control home-direction" placeholder="Chọn hướng">
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Hướng ban công</label>
                            <input type="text" class="form-control balcony-direction" placeholder="Chọn hướng">
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Đường vào</label>
                            <div>
                                <input type="text" class="form-control road-house" list="" unit="m" placeholder="Nhập số">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Mặt tiền</label>
                            <div>
                                <input type="text" class="form-control front" list="" unit="m" placeholder="Nhập số">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="furniture" class="form-label">Nội thất</label>
                    <input type="text" class="form-control" name="furniture" aria-describedby="furniture" placeholder="VD: Nội thất đầy đủ">
                    <div id="furniture" class="form-text text-danger">Trường không được bỏ trống</div>
                </div>
            </div>

            <div class="tab-info image-video">
                <div class="title">Thông tin bất động sản</div>
                <p>Hãy dùng ảnh thật, không trùng, không chèn số điện thoại. Mỗi ảnh kích thước tối thiểu 400x400, tối đa 15 MB. Số lượng ảnh tối đa tuỳ theo loại tin. Xem thêm Quy định đăng tin.</p>
            </div>
            <div class="tab-info contact">
                <div class="title">Thông tin liên hệ</div>
                <div class="mb-3">
                    <div class="specific-address row">
                        <div class="col-6">
                            <label for="districts" class="form-label">Tên liên hệ <span class="text-required">*</span></label>
                            <input type="text" class="form-control contact-name" list="">
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Số điện thoại <span class="text-required">*</span></label>
                            <input type="text" class="form-control districts" list="">
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control districts" list="">
                        </div>
                        <div class="col-6">
                            <label for="districts" class="form-label">Email</label>
                            <input type="text" class="form-control districts" list="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-info form-footer text-end">
            <button type="submit" class="btn btn-primary">Đăng bài</button>
        </div>
    </form>
</div>
@endsection

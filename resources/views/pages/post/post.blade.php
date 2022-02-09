@extends('layouts.master_layout')
@section('title')
{{ isset($article) ? 'Chỉnh sửa bài viêt "'.$article->title.'"' : 'Đăng tin mới' }}
@endsection
@section('main')

<div class="post-form-action col-xl-8 mx-auto pt-3">
    <form method="post" action="{{ isset($article) ? route('post.update', $article->id) : route('post.store') }}"
          class="form-post needs-validation" novalidate id="formPost"  enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            <div class="tab-info basic-information">
                <div class="title">Thông tin cơ bản</div>
                <div class="mb3 type-post">
                    <div class="form-check">
                        <input class="type-post-input" type="radio" name="form" id="sell"
                                data-type="0" {{ isset($article) ? (($article->form == 0) ? 'checked' : '') : 'checked'}} hidden value="0">
                        <label class="form-check-label" for="sell">
                            Bán
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="type-post-input" type="radio" name="form" id="lease" data-type="1" hidden
                                value="1" {{ (isset($article)) ? (($article->form == 1) ? 'checked' : '') : '' }}>
                        <label class="form-check-label" for="lease">
                            Cho thuê
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Loại bất động sản <span class="text-required">*</span></label>
                    <select class="form-select" aria-label="Default select example" id="typeOfRealEstate"
                            aria-describedby="typeOfRealEstateHelp" name="category_id" required>
                        <option selected disabled hidden value>Loại bất động sản</option>
                        @foreach($sell as $c)
                            <option value="{{ $c->id }}" {{ (isset($article) && $article->category_id == $c->id) ? 'selected' : '' }}>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Vui lòng chọn Loại bất động sản
                    </div>
                    @error('category_id')
                         <div id="typeOfRealEstateHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <div class="specific-address row">
                        <div class="col-sm-6">
                            <label for="provinces" class="form-label">Tỉnh / Thành phố <span class="text-required">*</span></label>
                            <select  name="province_id" aria-describedby="provinceHelp" data-type="provinces"
                                     class="select-local form-select" required>
                                <option disabled selected hidden value>Tỉnh/ Thành phố</option>
                                @foreach ($province as $prov)
                                    <option value="{{ $prov->id }}" {{ (isset($article) && $article->province_id == $prov->id) ? 'selected' : '' }}>{{ $prov->_name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn Tỉnh / Thành phố
                            </div>
                            @error('province_id')
                                 <div id="provinceHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="districts" class="form-label">Quận/ Huyện <span class="text-required">*</span></label>
                            <select name="district_id" aria-describedby="districtHelp" data-type="districts"
                                    class="select-local form-select" required>
                                <option disabled selected hidden value>Quận / Huyện</option>
                                @if (isset($article) && isset($districts))
                                    @foreach ($districts as $dist)
                                        <option value="{{ $dist->id }}" {{ ($article->district_id == $dist->id) ? 'selected' : '' }}>{{ $dist->_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn Quận / Huyện
                            </div>
                            @error('district_id')
                                 <div id="districtHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="districts" class="form-label">Phường / Xã <span class="text-required">*</span></label>
                            <select name="ward_id" aria-describedby="wardHelp" data-type="wards"
                                     class="select-local form-select" required>
                                <option disabled selected hidden value>Phường / Xã</option>
                                @if (isset($article) && isset($wards))
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}" {{ ($article->district_id == $ward->id) ? 'selected' : '' }}>{{ $ward->_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn Phường / Xã
                            </div>
                            @error('ward_id')
                                 <div id="wardHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="street" class="form-label">Đường <span class="text-required">*</span></label>
                            <input placeholder="Đường" class="form-control dropdown-toggle" type="text"
                                    autocomplete="off" name="street_id" aria-describedby="streetHelp"  required
                                    value="{{ isset($article) ? (($article->street_id) ? $article->street_id : '') : '' }}">
                            <div class="invalid-feedback">
                                Vui lòng nhập tên đường
                            </div>
                            @error('street_id')
                                    <div id="streetHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address_on_post" class="form-label">Địa chỉ hiển thị trên tin đăng <span class="text-required">*</span></label>
                    <input type="text" class="form-control" placeholder="Bạn có thể bổ sung hẻm, ngách, ngõ..." name="address_on_post"
                            aria-describedby="addressOnPostHelp"
                            value="{{ isset($article) ? (($article->address_on_post) ? $article->address_on_post : '') : '' }}" required>
                    <div class="invalid-feedback">
                        Trường không được bỏ trống
                    </div>
                    @error('address_on_post')
                            <div id="addressOnPostHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="position_map" class="form-label">Vị trí trên bản đồ</label>
                    <div class="map">
                         {{-- <script
                            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap&v=weekly"
                            async
                        ></script> --}}


                    </div>
                </div>
            </div>
            <div class="tab-info post-information">
                <div class="title">Thông tin bài viết</div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Tiêu đề <span class="text-required">*</span></label>
                    <div class="form-input">
                        <textarea class="form-control" placeholder="VD: Bán nhà riêng 50m2 chính chủ tại Cầu Giấy" name="title" rows="2" id="typeOfRealEstate"
                        aria-describedby="titleHelp" required>{{ isset($article) ? (($article->title) ? $article->title : '') : '' }}</textarea>
                        <div class="invalid-feedback" id="titleHelp">
                            Trường không được bỏ trống
                        </div>
                    </div>
                    @error('address_on_post')
                        <div id="titleHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Mô tả ngắn <span class="text-required">*</span></label>
                    <div class="form-input">
                        <textarea class="form-control" placeholder="Nhập mô tả ngắn về bất động sản của bạn."
                                    name="sub_title" rows="3" aria-describedby="subTitleHelp" required>{{ isset($article) ? (($article->sub_title) ? $article->sub_title : '') : '' }}</textarea>
                    <div class="invalid-feedback">
                        Trường không được bỏ trống
                      </div>
                    </div>
                    @error('sub_title')
                        <div id="subTitleHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contents" class="form-label">Mô tả chi tiết <span class="text-required">*</span></label>
                    <div class="form-input">
                        <textarea class="form-control ck-editor" aria-describedby="contentHelp"
                                placeholder="Nhập mô tả chung về bất động sản của bạn. Ví dụ: Khu nhà có vị trí thuận lợi, gần công viên, gần trường học,..."
                                name="contents" rows="5" >{{ isset($article) ? (($article->content) ? $article->content : '') : '' }}</textarea>
                                <div class="invalid-feedback">
                                    Trường không được bỏ trống
                                  </div>
                    </div>
                    @error('contents')
                        <div id="contentHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="tab-info real-estate-information">
                <div class="title">Thông tin bất động sản</div>
                <div class="mb-3">
                    <label for="acreage" class="form-label">Diện tích <span class="text-required">*</span></label>
                    <div class="acreage">
                        <input type="number" class="form-control" placeholder="Nhập diện tích, VD 80" unit="m²" name="acreage" aria-describedby="acreageHelp"
                                value="{{ isset($article) ? (($article->acreage) ? $article->acreage : '') : '' }}" required>
                        <div class="invalid-feedback">
                            Trường không được bỏ trống
                        </div>
                    </div>
                    @error('acreage')
                        <div id="acreageHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="typeOfRealEstate" class="form-label">Mức giá <span class="text-required">*</span></label>
                    <div class="price row">
                        <div class="col-sm-9 col-7">
                            <input type="number" class="form-control price" aria-describedby="priceHelp" name="price"\
                                    value="{{ isset($article) ? (($article->price) ? $article->price : '') : '' }}"
                                    {{ isset($article) ? (($article->unit == 'Thỏa thuận') ? 'disabled' : '') : '' }} required>
                            <div class="invalid-feedback">
                                Trường không được bỏ trống
                            </div>
                            @error('price')
                                <div id="priceHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-3 col-5">
                            <select class="form-select" aria-label="" name="unit" aria-describedby="unitHelp" required>
                                <option selected disabled hidden value>Đơn vị</option>
                                <option value="VNĐ" {{ isset($article) ? (($article->unit == 'VNĐ') ? 'selected' : '') : '' }}>VNĐ</option>
                                <option value="/ m²" {{ isset($article) ? (($article->unit == '/ m²') ? 'selected' : '') : '' }}>Giá / m²</option>
                                <option value="Thỏa thuận" {{ isset($article) ? (($article->unit == 'Thỏa thuận') ? 'selected' : '') : '' }}>Thỏa thuận</option>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn Đơn vị
                            </div>
                            @error('unit')
                                <div id="unitHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="legal_documents" class="form-label">Giấy tờ pháp lý <span class="text-required">*</span></label>
                    <input type="text" class="form-control legal_documents" placeholder="Giấy tờ pháp lý" name="legal_documents"
                            value="{{ isset($article) && $article->legal_documents ? $article->legal_documents : 'Chính chủ ' }}"
                            aria-describedby="legalDocumentsHelp" required>
                    @error('legal_documents')
                        <div id="legalDocumentsHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="row g-3 align-items-center hidden_field">
                        <div class="col-sm-9 col-6">
                        <label for="bedroom" class="col-form-label">Số phòng ngủ</label>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="input-group input-group-step">
                                <span class="input-group-btn">
                                    <button type="button" class=" btn-step"  data-type="minus" data-field="bedroom">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="bedroom" class="form-control input-step"
                                        value="{{ isset($article) ? (($article->bedroom) ? $article->bedroom : 0) : 0 }}" min="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-step" data-type="plus" data-field="bedroom">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-9 col-6">
                        <label for="" class="col-form-label">Số phòng tắm, vệ sinh</label>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="input-group input-group-step">
                                <span class="input-group-btn">
                                    <button type="button" class=" btn-step"  data-type="minus" data-field="toilet">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="toilet" class="form-control input-step"
                                        value="{{ isset($article) ? (($article->toilet) ? $article->toilet : 0) : 0 }}" min="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-step" data-type="plus" data-field="toilet">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-9 col-6">
                        <label for="" class="col-form-label">Số tầng</label>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="input-group input-group-step">
                                <span class="input-group-btn">
                                    <button type="button" class=" btn-step"  data-type="minus" data-field="floor">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" name="floor" class="form-control input-step"
                                        value="{{ isset($article) ? (($article->floor) ? $article->floor : 0) : 0 }}" min="0">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-step" data-type="plus" data-field="floor">
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
                        <div class="col-6 hidden_field">
                            <label for="house_direction" class="form-label">Hướng nhà</label>
                            <select type="text" class="form-select home-direction" name="house_direction" aria-describedby="houseDirectionHelp">
                                <option selected disabled hidden>Chọn hướng</option>
                                @foreach ($direction as $dir)
                                    <option value="{{ $dir->id }}" {{ (isset($article) && $article->house_direction == $dir->id) ? 'selected' : '' }}>{{ $dir->name }}</option>
                                @endforeach
                            </select>
                            @error('house_direction')
                                <div id="houseDirectionHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 hidden_field">
                            <label for="balcony_direction" class="form-label">Hướng ban công</label>
                            <select type="text" class="form-select balcony-direction" name="balcony_direction" aria-describedby="acreageHelp">
                                <option selected disabled hidden>Chọn hướng</option>
                                @foreach ($direction as $dir)
                                    <option value="{{ $dir->id }}" {{ (isset($article) && $article->balcony_direction == $dir->id) ? 'selected' : '' }}>{{ $dir->name }}</option>
                                @endforeach
                            </select>
                            @error('balcony_direction')
                                <div id="balconyDirectionHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="way" class="form-label">Đường vào</label>
                            <div>
                                <input type="number" class="form-control road-house" unit="m" step="any" placeholder="Nhập số" name="way"
                                        value="{{ (isset($article) && $article->way) ? $article->way : '' }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="facade" class="form-label">Mặt tiền</label>
                            <div>
                                <input type="number" class="form-control front" unit="m" placeholder="Nhập số" name="facade"
                                        value="{{ (isset($article) && $article->facade) ? $article->facade : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 hidden_field">
                    <label for="furniture" class="form-label">Nội thất</label>
                    <input type="text" class="form-control" name="furniture" aria-describedby="furnitureHelp" placeholder="VD: Nội thất đầy đủ"
                            value="{{ (isset($article) && $article->furniture) ? $article->furniture : '' }}">
                </div>
            </div>

            <div class="tab-info image-video">
                <div class="title">Thông tin bất động sản</div>
                <p>Hãy dùng ảnh thật, không trùng, không chèn số điện thoại. Mỗi ảnh kích thước tối thiểu 400x400, tối đa 15 MB. Số lượng ảnh tối đa tuỳ theo loại tin</p>
                <div class="container-upload">
                    <label for="input-gallery" class="form-label">Hình ảnh</label>
                    <input type="file" multiple accept="image/*" class="input-gallery" name="image[]" step="any" hidden>
                    <div class="box-upload">
                        <i class="fas fa-upload"></i>
                        <p>Bấm để chọn ảnh cần tải lên</p>
                        {{-- <span>Hoặc có thể kéo thả ảnh vào đây</span> --}}
                    </div>
                    <div class="review-image-upload row row-cols-1 row-cols-md-3 g-4">
                        {{-- review img upload --}}
                        @if (isset($article) && $article->imagesArticle)
                            @foreach ($article->imagesArticle as $index => $img)
                            <div class="col">
                                    <input type="text" value="{{ $img->id }}" name="old_images[]"hidden>
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ getUrlImageUpload($img->image) }}" class="card-img-top" alt="...">
                                            <div class="actions">
                                                <i class="fas fa-undo rotate mr-3" title="Xoay"></i>
                                                <i class="far fa-window-close destroy" title="Xóa" data-index="{{ ++$index }}"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <input type="text" class="form-control"  placeholder="Nhập mô tả" name="description_img[]"
                                                    value="{{ $img->description_img }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-info contact">
                <div class="title">Thông tin liên hệ</div>
                <div class="mb-3">
                    <div class="specific-address row">
                        <div class="col-sm-6">
                            <label for="name_contact" class="form-label">Tên liên hệ <span class="text-required">*</span></label>
                            <input type="text" class="form-control" name="name_contact" aria-describedby="nameContactHelp"
                                    value="{{ (isset($article) && $article->name_contact) ? $article->name_contact : '' }}" required>
                                    <div class="invalid-feedback">
                                        Trường không được bỏ trống
                                    </div>
                            @error('name_contact')
                                <div id="nameContactHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="phone_contact" class="form-label">Số điện thoại <span class="text-required">*</span></label>
                            <select multiple class="form-control" name="phone_contact[]" aria-describedby="phoneContactHelp" data-role="tagsinput" >
                                @if (isset($article) && $article->phone_contact)
                                    @foreach (explode(',', $article->phone_contact) as $phone)
                                        <option value="{{ $phone }}">{{ $phone }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                Trường không được bỏ trống
                            </div>
                            @error('phone_contact')
                                <div id="phoneContactHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="address_contact" class="form-label">Địa chỉ <span class="text-required">*</span></label>
                            <input type="text" class="form-control" name="address_contact" aria-describedby="addressContactHelp"
                                    value="{{ (isset($article) && $article->address_contact) ? $article->address_contact : '' }}" required>
                                    <div class="invalid-feedback">
                                        Trường không được bỏ trống
                                    </div>
                            @error('address_contact')
                                <div id="addressContactHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="email_contact" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_contact" aria-describedby="emailContactHelp"
                            value="{{ (isset($article) && $article->email_contact) ? $article->email_contact : '' }}">
                            @error('email_contact')
                                <div id="emailContactHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-info form-footer text-end">
            <button type="submit" class="btn btn-primary" style="min-width: 100px;">{{ isset($article) ? 'Lưu' : 'Đăng bài' }}</button>
        </div>
    </form>
</div>

@push('scripts')

    @if (session('msg'))
        <script>
                Swal.fire({
                    position: 'center-center',
                    icon: '{!! session('status') !!}',
                    title: '{!! session('msg') !!}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
    @endif
@endpush
@endsection


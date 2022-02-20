@extends('layouts.master_layout')
@section('title')
    Dự án
@endsection
@section('main')

    <div class="post-form-action col-xl-8 mx-auto pt-3">
        <form method="post" action="{{ isset($article) ? route('post.update', $article->id) : route('post.store') }}"
              class="form-post needs-validation" novalidate id="formPost"  enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="tab-info basic-information">
                    <div class="title">Thêm mới dự án</div>

                    <div class="mb-3">
                        <label for="typeOfRealEstate" class="form-label">Loại dự án <span class="text-required">*</span></label>

                        <select class="form-select" aria-label="Default select example" id="typeOfRealEstate"
                                aria-describedby="typeOfRealEstateHelp" name="category_id" required>
                            <option selected disabled hidden value="">Chọn loại dự án </option>
                            @php
                                if(isset($is_lease) && $is_lease === true){
                                    $sell = $lease;
                                }
                            @endphp
                            @foreach($typeProject as $c)
                                <option value="{{ $c->id }}" >{{ $c->name }}</option>
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
                        <label for="typeOfRealEstate" class="form-label">Mức giá / căn / nền <span class="text-required">*</span></label>
                        <div class="price row">
                            <div class="col-6">
                                <input type="number" class="form-control price" aria-describedby="priceHelp" name="price"
                                       value="{{ isset($article) ? (($article->price) ? $article->price : '') : '' }}"
                                       {{ isset($article) ? (($article->unit == 'Thỏa thuận') ? 'disabled' : '') : '' }} required placeholder="Giá thấp nhất">
                                <div class="invalid-feedback">
                                    Trường không được bỏ trống
                                </div>
                                @error('price')
                                <div id="priceHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control price" aria-describedby="priceHelp" name="price"
                                       value="{{ isset($article) ? (($article->price) ? $article->price : '') : '' }}"
                                       {{ isset($article) ? (($article->unit == 'Thỏa thuận') ? 'disabled' : '') : '' }} required placeholder="Giá cao nhất">
                                <div class="invalid-feedback">
                                    Trường không được bỏ trống
                                </div>
                                @error('price')
                                <div id="priceHelp" class="form-text text-danger">{{ $message }}</div>
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

                    &nbsp;
                    <div class="mb-4 hidden_field">
                        <div class="d-flex" style="justify-content: space-between">
                            <h5 style="font-weight: bold;font-size: 14px;">Tiện ích </h5>
                            <span style="color: #3498db; cursor: pointer; font-size: 1.3rem" title="Thêm mới"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="row mb-2" >
                            <div class="col-6 mb-1" style="display: flex;align-items: center;">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder="Từ khóa"
                                       value="">
                                <i class="fas fa-trash-alt " style="color: #c0392b;cursor: pointer;    color: #c0392b;cursor: pointer;
                                padding: 0 10px;" title="Xóa"></i>
                            </div>
                            <div class="col-6 mb-1" style="display: flex;align-items: center;">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder="Từ khóa"
                                       value="">
                                <i class="fas fa-trash-alt " style="color: #c0392b;cursor: pointer;    color: #c0392b;cursor: pointer;
                                padding: 0 10px;" title="Xóa"></i>
                            </div>
                        </div>

                    </div>
                    &nbsp;
                    <div class="mb-4 hidden_field">
                        <div class="d-flex" style="justify-content: space-between">
                            <h5 style="font-weight: bold;font-size: 14px;">Thông tin dự án </h5>
                            <span style="color: #3498db; cursor: pointer; font-size: 1.3rem" title="Thêm mới"><i class="fas fa-plus"></i></span>
                        </div>
                        <div class="row mb-2" style="align-items: center">
                            <div class="col-md-4 mb-1">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder="Chủ đầu tư"
                                       value="">
                            </div>
                            <div class="col-md-7 mb-1">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder=""
                                       value="">
                            </div>
                            <div class="col-md-1" style="    text-align: end;">
                                <i class="fas fa-trash-alt " style="color: #c0392b;cursor: pointer;" title="Xóa"></i>
                            </div>
                        </div>
                        <div class="row mb-2" style="align-items: center">
                            <div class="col-md-4 mb-1">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder="Quy mô dự án"
                                       value="">
                            </div>
                            <div class="col-md-7 mb-1">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder=""
                                       value="">
                            </div>
                            <div class="col-md-1" style="    text-align: end;">
                                <i class="fas fa-trash-alt " style="color: #c0392b;cursor: pointer;" title="Xóa"></i>
                            </div>
                        </div>
                        <div class="row mb-2" style="align-items: center">
                            <div class="col-md-4 mb-1">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder="Tổng diện tích"
                                       value="">
                            </div>
                            <div class="col-md-7 mb-1">
                                <input type="text" class="form-control" name="" required aria-describedby="furnitureHelp" placeholder=""
                                       value="">
                            </div>
                            <div class="col-md-1" style="    text-align: end;">
                                <i class="fas fa-trash-alt " style="color: #c0392b;cursor: pointer;" title="Xóa"></i>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-info image-video">
                    <div class="title">Album ảnh</div>
                    <p>Hãy dùng ảnh thật, không trùng, không chèn số điện thoại. Mỗi ảnh kích thước tối thiểu 400x400, tối đa 15 MB. Số lượng ảnh tối đa tuỳ theo loại tin</p>
                    <div class="container-upload">
                        <label for="input-gallery" class="form-label">Hình ảnh</label>
                        <input type="file" multiple accept="image/*" class="input-gallery" id="input-gallery" name="image[]" step="any" hidden>
                        <div class="box-upload" id="box-upload">
                            <i class="fas fa-upload"></i>
                            <p>Bấm để chọn ảnh cần tải lên</p>
                            {{-- <span>Hoặc có thể kéo thả ảnh vào đây</span> --}}
                        </div>
                        <div class="review-image-upload row row-cols-1 row-cols-md-3 g-4" id="review-image-upload">
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
                <div class="tab-info image-video">
                    <div class="title">Thiết kế kế dự án</div>
                    <p>Hãy dùng ảnh thật, không trùng, không chèn số điện thoại. Mỗi ảnh kích thước tối thiểu 400x400, tối đa 15 MB. Số lượng ảnh tối đa tuỳ theo loại tin</p>
                    <div class="container-upload">
                        <label for="input-gallery" class="form-label">Hình ảnh</label>
                        <input type="file" multiple accept="image/*" class="input-gallery" id="input-gallery2" name="image[]" step="any" hidden>
                        <div class="box-upload" id="box-upload2">
                            <i class="fas fa-upload"></i>
                            <p>Bấm để chọn ảnh cần tải lên</p>
                            {{-- <span>Hoặc có thể kéo thả ảnh vào đây</span> --}}
                        </div>
                        <div class="review-image-upload row row-cols-1 row-cols-md-3 g-4" id="review-image-upload2">
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


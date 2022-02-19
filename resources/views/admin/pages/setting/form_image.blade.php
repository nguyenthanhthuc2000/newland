@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 pos-r">
        <div class="col-md-12 pt-3">
            <form action="{{ route($route, $id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="d-flex mb-2" style="justify-content: space-between;    align-items: center;">
                <h4 class="c-grey-900 m-0">{{request()->route()->getName() == 'admin.edit.slider' ? 'Cập nhật' : 'Thêm mới'}} hình ảnh </h4>
                <button type="submit" class="btn btn-primary btn-color btn__border">Lưu</button>
            </div>
            <!-- #Sales Report ==================== -->
            <div class="row gap-20">
                <div class="col-md-8 col-12 pt-3">
                    <div class="bgc-white p-20 bd">
                        <input type="hidden" name="type" value="{{ $type }}">
                        <div class="">
                            <div class="mb-3">
                                <label class="form-label" for="description_img	">Tên</label>
                                <input type="text" class="form-control" value="{{ $image ? $image->description_img : '' }}" name="description_img" id="description_img" placeholder="Tên hình ảnh">
                                @error('description_img')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="link">Link</label>
                                <input type="text" class="form-control" value="{{ $image ? $image->link : '' }}" name="link" id="link" placeholder="Đường dẩn liên kết..">
                                @error('link')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 pt-3 mb-3">
                    <div class="bgc-white p-20 bd">
                        <div class="">
                            <div class="mb-3">
                                <label class="form-label" for="image">Hình ảnh <span style="color: red;">*</span></label>
                                <input type="file" name="image"  id="input_file_img" class="form-control" id="image" hidden>
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="review-img">
                                    <img id="review-img" class="img-fluid" src="{{ getUrlImageUpload($image ? $image->image : '' , 'slider') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

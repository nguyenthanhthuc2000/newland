@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6">

        </div>
        @include('admin.layouts.alert')
        <div class="masonry-item col-md-12 pt-3">
            <div class="d-flex mb-3" style="justify-content: space-between;    align-items: center;">
                <h4 class="c-grey-900 m-0">{{$titlePage}}</h4>
                <a href="{{ route($routeCreate) }}" class="btn btn-primary bdrs-50p p-10 lh-0 "
                >
                    <i class="ti-plus"></i>
                </a>
            </div>
            <!-- #Sales Report ==================== -->
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100">
                        <div class="table-responsive p-20">
                            @if($images->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">Hình ảnh</th>
                                        <th class=" bdwT-0">Mô tả</th>
                                        <th class=" bdwT-0">Ngày tạo</th>
                                        <th class=" bdwT-0 text-center">Liên kết</th>
                                        <th class=" bdwT-0 text-center">Trạng thái</th>
                                        <th class=" bdwT-0 text-end">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                            <td class="max-w-100">
                                                <img class="img__table" target="_blank" src="{{ getUrlImageUpload($image->image, 'slider') }}">
                                            </td>
                                            <td class="fw-600">{{ $image->description_img }}</td>
                                            <td>{{ formatTime($image->created_at) }}</td>
                                            <td class="fw-600 text-center"><a href="{{ $image->link }}"><i class="fal fa-link"></i></a></td>
                                            <td class="text-center">
                                                <div class="form-check form-switch text-center">
                                                    <input class="form-check-input update-status-slider" type="checkbox" data-id="{{$image->id}}"
                                                           id="flexSwitchCheckDefault" {{ $image->status == 1 ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td class="text-end ">
                                                <a href="{{ route('admin.edit.slider',  $image->id) }}"
                                                   class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5"><i class="ti-pencil"></i>
                                                </a>
                                                <a href="#" class="td-n c-red-500 cH-blue-500 fsz-md p-5 btn__delete__slider" data-id="{{ $image->id }}"><i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                Không có dữ liệu
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

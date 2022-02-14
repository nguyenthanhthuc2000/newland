@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6">

        </div>
        <div class="masonry-item col-md-12">
            <!-- #Sales Report ==================== -->
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100">
                        <div class="bgc-light-blue-500 c-white p-10">
                            <div class="peers ai-c jc-sb gap-40">
                                <div class="peer peer-greed d-flex" style="justify-content: space-between">
                                    <h5>Danh mục</h5>
                                    <a href="#" class="btn__header__page btn"><i class="fal fa-plus"></i> Thêm</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-20">
                            @if($categories->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">Tên danh mục</th>
                                        <th class=" bdwT-0">Loại</th>
                                        <th class=" bdwT-0 text-center">Trạng thái</th>
                                        <th class=" bdwT-0 text-end">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="fw-600"><a href="{{ route('admin.profile.customer', encrypt_decrypt($category->id)) }}">
                                                    {{ $category->name }}</a></td>
                                            <td class="fw-600">{{ $category->type == 1 ? 'Mua bán' : 'Cho thuê' }}</td>
                                            <td class="fw-600 text-center">
                                                <div class="form-check form-switch text-center">
                                                    <input class="form-check-input btn-status-category" type="checkbox"
                                                           data-id="{{ encrypt_decrypt($category->id) }}"
                                                           id="flexSwitchCheckDefault" {{ $category->status == 1 ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td class="text-end d-flex" style="justify-content: end">
                                                <a href="#" class="td-n c-red-500 cH-blue-500 fsz-md p-5"><i class="ti-trash"></i></a>
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
                <div class="paginate-styling">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

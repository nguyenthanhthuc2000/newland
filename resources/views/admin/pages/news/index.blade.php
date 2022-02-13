@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 pos-r">
        <div class="col-md-12">
            <!-- #Sales Report ==================== -->
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100">
                        @include('admin.layouts.alert')
                        <div class="bgc-light-blue-500 c-white p-10">
                            <div class="peers ai-c jc-sb gap-40">
                                <div class="peer peer-greed">
                                    <h5>Danh sách bài viết</h5>
                                </div>
                                <a href="{{ route('news.crawl.news.cafe.f') }} " class="btn__header__page btn"><i class="fal fa-plus"></i> Cập nhật</a>
                                <a href="{{ route('news.add') }} " class="btn__header__page btn"><i class="fal fa-plus"></i> Thêm mới</a>
                            </div>
                        </div>
                        {{--                        <div class="">--}}
                        {{--                            <form action="" method="get">--}}
                        {{--                                <div class="row" style=" padding: 0 20px;">--}}
                        {{--                                    <div class="col-md-3 p-5">--}}
                        {{--                                        <div class="row" style="align-items: center">--}}
                        {{--                                            <div class="col-3">--}}
                        {{--                                                <span>TrạngThái</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-9">--}}
                        {{--                                                <select class="form-select py-2" aria-label="Status" name="status">--}}
                        {{--                                                    <option value="0" {{ request()->get('status') == '' ? 'selected' : ''}}>-- Tất cả --</option>--}}
                        {{--                                                    <option value="0" {{ request()->get('status') == '0' ? 'selected' : ''}}>Chờ duyệt</option>--}}
                        {{--                                                    <option value="1" {{ request()->get('status') == '1' ? 'selected' : ''}}>Đã duyệt</option>--}}
                        {{--                                                    <option value="2" {{ request()->get('status') == '2' ? 'selected' : ''}}>Đã từ chối</option>--}}
                        {{--                                                </select>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-3 p-5">--}}
                        {{--                                        <div class="row" style="align-items: center">--}}
                        {{--                                            <div class="col-3">--}}
                        {{--                                                <span>Loại tin</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-9">--}}
                        {{--                                                <select class="form-select py-2" aria-label="Status" name="vip">--}}
                        {{--                                                    <option value="0" {{ request()->get('loai') == '4' ? 'selected' : ''}}>-- Tất cả --</option>--}}
                        {{--                                                    <option value="0" {{ request()->get('loai') == '0' ? 'selected' : ''}}>Thường</option>--}}
                        {{--                                                    <option value="1" {{ request()->get('loai') == '1' ? 'selected' : ''}}>Vip 1</option>--}}
                        {{--                                                    <option value="2" {{ request()->get('loai') == '2' ? 'selected' : ''}}>Vip 2</option>--}}
                        {{--                                                    <option value="3" {{ request()->get('loai') == '3' ? 'selected' : ''}}>Vip 3</option>--}}
                        {{--                                                </select>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-3 p-5">--}}
                        {{--                                        <div class="row" style="align-items: center">--}}
                        {{--                                            <div class="col-3">--}}
                        {{--                                                <span>Nổi bật</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-9">--}}
                        {{--                                                <select class="form-select py-2" aria-label="Status" name="featured">--}}
                        {{--                                                    <option value="0" {{ request()->get('noi_bat') == '2' ? 'selected' : ''}}>-- Tất cả --</option>--}}
                        {{--                                                    <option value="0" {{ request()->get('noi_bat') == '0' ? 'selected' : ''}}>Có</option>--}}
                        {{--                                                    <option value="1" {{ request()->get('noi_bat') == '1' ? 'selected' : ''}}>Không</option>--}}
                        {{--                                                </select>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-3 p-5">--}}
                        {{--                                        <div class="row" style="align-items: center">--}}
                        {{--                                            <div class="col-3">--}}
                        {{--                                                <span>TìnhTrạng</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-9">--}}
                        {{--                                                <select class="form-select py-2" aria-label="Status" name="state">--}}
                        {{--                                                    <option value="0" {{ request()->get('tinh_trang') == '4' ? 'selected' : ''}}>-- Tất cả --</option>--}}
                        {{--                                                    <option value="0" {{ request()->get('tinh-trang') == '0' ? 'selected' : ''}}>Tin mới</option>--}}
                        {{--                                                    <option value="1" {{ request()->get('tinh-trang') == '1' ? 'selected' : ''}}>Đã đặt cọc</option>--}}
                        {{--                                                    <option value="2" {{ request()->get('tinh-trang') == '2' ? 'selected' : ''}}>Đã được bán</option>--}}
                        {{--                                                    <option value="3" {{ request()->get('tinh-trang') == '3' ? 'selected' : ''}}>Đã được thuê</option>--}}
                        {{--                                                </select>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-3  p-5">--}}
                        {{--                                        <div class="row" style="align-items: center">--}}
                        {{--                                            <div class="col-3">--}}
                        {{--                                                <span>Từ</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-9">--}}
                        {{--                                                <input type="date" name="created_at" value="{{ request()->get('from_day')  ? request()->get('to_day') : getCurrentDay()}}" class="form-control p-input filter-date" >--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-3  p-5">--}}
                        {{--                                        <div class="row" style="align-items: center">--}}
                        {{--                                            <div class="col-3">--}}
                        {{--                                                <span>Đến</span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-9">--}}
                        {{--                                                <input type="date" name="to_day" value="{{ request()->get('to_day')  ? request()->get('to_day') : getCurrentDay()}}" class="form-control p-input filter-date" >--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-6 p-5 d-flex" style="justify-content: end">--}}
                        {{--                                        <button type="reset" class="btn btn-mute"><i class="fal fa-sync btn__filter"></i></button>--}}
                        {{--                                        <button class="btn btn-primary btn__border" style="color:#fff;">Tìm kiếm</button>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </form>--}}
                        {{--                        </div>--}}
                        <div class="table-responsive p-20">
                            @if($news->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">Mã</th>
                                        <th class=" bdwT-0">Hình ảnh</th>
                                        <th class=" bdwT-0" style="min-width: 300px">Tiêu đề</th>
                                        <th class=" bdwT-0" style="min-width: 100px">Thời gian</th>
                                        <th class=" bdwT-0 text-center" style="min-width: 100px">Trạng thái</th>
                                        <th class=" bdwT-0 text-end">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $n)
                                        <tr>
                                            <td class="fw-600">{{ strtoupper($n->code) }}</td>
                                            <td class="max-w-100">
                                                <img class="img__table" target="_blank" src="{{ $n->photo }}">
{{--                                                <img class="img__table" target="_blank" src="{{ $n->photo }}">--}}
                                            </td>
                                            <td class="fw-600"><a href="" class="text-split-2">{{ $n->title }}</a></td>
                                            <td>
                                            {{ formatTime($n->created_at) }}
                                            <td class="text-center">
                                                <div class="form-check form-switch text-center">
                                                    <input class="form-check-input update-status-news" type="checkbox" data-id="{{$n->id}}"
                                                           id="flexSwitchCheckDefault" {{ $n->status == 1 ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td class="text-end " style="">
                                                <div style="display: flex;">
                                                    <a href="{{ route('news.edit', encrypt_decrypt($n->id)) }}" class="badge bgc-green-50 c-green-700 p-15 lh-0 tt-c rounded-pill btn__confirm m-1"
                                                       data-id="{{ $n->id }}">Sửa
                                                    </a>
                                                    <a  href="{{ route('news.destroy', $n->id) }}" class="badge bgc-red-50 c-red-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn_destroy_news m-1"
                                                        data-id="{{ $n->id }}">Xóa
                                                    </a>

                                                </div>
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
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20  pos-r">
        <div class="masonry-item col-md-3 mb-3">
            <div class="bgc-white p-20 bd text-center">
                <div class="">
                    <div class="mb-3">
                        <img class="img-fluid" src="{{ getUrlImageUpload($info->avatar, 'avatar') }}" alt="" style="width: 200px; height: 200px; border-radius: 50%;
    object-fit: cover;">
                    </div>
                    <p style="text-transform: uppercase; font-weight: bolder; margin: 0">{{ $info->name }}</p>
                    <p style=" margin: 0">Số dư: <span style=" font-weight: bolder; color: #c0392b;">{{ formatNumber($info->surplus) }} vnđ </span></p>
                    <p style=" margin: 0">Giới tính:
                        <span style=" font-weight: bolder; color: #c0392b;">
                            @if($info->sex != null)
                                @if($info->sex == 1)
                                    Nam
                                @elseif($info->sex == 0)
                                    Nữ
                                @else
                                    Khác
                                @endif
                            @else
                                <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                            @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-9 mb-3">
            <div class="bgc-white p-20 bd row">
                <div class="col-md-12">

                    <div class="">
                        <table class="table">
                            <tr>
                                <td class="fw-400">Số điện thoại</td>
                                <td class="fw-600">
                                    @if($info->phone != null)
                                        {{ $info->phone }}
                                    @else
                                        <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-400">Email</td>
                                <td class="fw-600">
                                    @if($info->email != null)
                                        {{ $info->email }}
                                    @else
                                        <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-400">CMND/CCCD</td>
                                <td class="fw-600">
                                    @if($info->card_id != null)
                                        {{ $info->card_id }}
                                    @else
                                        <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-400">Loại tài khoản</td>
                                <td class="fw-600">
                                    {{ $info->account_type == 0 ? 'Cá nhân' : 'Công ty'}}
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-400">Địa chỉ</td>
                                <td class="fw-600">
                                    @if($info->ward != null)
                                        {{$info->ward->_prefix}} {{$info->ward->_name}},
                                        {{$info->district->_prefix}} {{$info->district->_name}},
                                        {{$info->province->_name}}
                                    @else
                                        <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-400">Ngày sinh</td>
                                <td class="fw-600">
                                    @if($info->birthday != null)
                                        {{ $info->birthday }}
                                    @else
                                        <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-400">Ngày đăng kí</td>
                                <td class="fw-600">
                                    @if($info->created_at != null)
                                        {{ $info->created_at }}
                                    @else
                                        <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- #Sales Report ==================== -->
            <div class="bd bgc-white mb-3">
                <div class="layers">
                    <div class="layer w-100">
                        <div class="bgc-light-blue-500 c-white p-10">
                            <div class="peers ai-c jc-sb gap-40">
                                <div class="peer peer-greed">
                                    <h5>Có tổng {{$articles->count()}} bài viết trên hệ thống</h5>
                                </div>
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
                            @if($articles->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">Mã</th>
                                        <th class=" bdwT-0" style="min-width: 300px">Tiêu đề</th>
                                        <th class=" bdwT-0 text-center">Loại</th>
                                        <th class=" bdwT-0 text-center" style="min-width: 70px">Nổi bật</th>
                                        <th class=" bdwT-0" style="min-width: 150px">Người đăng</th>
                                        <th class=" bdwT-0" style="min-width: 100px">Thời gian</th>
                                        <th class=" bdwT-0" style="min-width: 100px">Trạng thái</th>
                                        <th class=" bdwT-0 text-end">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td class="fw-600">{{ $article->private_code }}</td>
                                            <td class="fw-600"><a href="{{ route('post.detail',$article->slug) }}" class="text-split-2">{{ $article->title }}</a></td>
                                            <td class=" text-center" style="min-width: 120px">
                                                <select class="form-select update-vip-article" id="select-{{$article->id}}" aria-label="Default select example" data-id="{{ $article->id }}">
                                                    <option value="0" {{ $article->vip == 0 ? 'selected' : '' }}>Thường</option>
                                                    <option value="1" {{ $article->vip == 1 ? 'selected' : '' }}>Vip 1</option>
                                                    <option value="2" {{ $article->vip == 2 ? 'selected' : '' }}>Vip 2</option>
                                                    <option value="3" {{ $article->vip == 3 ? 'selected' : '' }}>Vip 3</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check form-switch text-center">
                                                    <input class="form-check-input update-featured-article" type="checkbox"  data-id="{{$article->id}}"
                                                        {{ $article->featured == 1 ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td><a href="" class="">{{ $article->user->name }}</a>
                                            </td>
                                            <td>
                                            {{ formatTime($article->created_at) }}
                                            <td>
                                                @if($article->status == 0)
                                                    <span class=" badge bgc-yellow-50 c-yellow-700 p-10 lh-0 tt-c rounded-pill">Chờ xử lí</span>
                                                @elseif($article->status == 1)
                                                    <span class=" badge bgc-green-50 c-green-700 p-10 lh-0 tt-c rounded-pill">Đã duyệt</span>
                                                @else
                                                    <span class=" badge bgc-red-50 c-red-700 p-10 lh-0 tt-c rounded-pill">Đã từ chối</span>
                                                @endif
                                            </td>
                                            <td class="text-end " style="">
                                                @if($article->status == 1)
                                                    <span class="badge bgc-red-50 c-red-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn__unconfirm__article m-1"
                                                          data-id="{{ $article->id }}">Từ chối
                                                </span>
                                                @elseif($article->status == 0 || $article->status == 2)
                                                    <div class="d-flex">
                                                    <span class="badge bgc-green-50 c-green-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn__confirm__article m-1"
                                                          data-id="{{ $article->id }}">Duyệt
                                                    </span>
                                                        <span class="badge bgc-red-50 c-red-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn__unconfirm__article m-1"
                                                              data-id="{{ $article->id }}">Từ chối
                                                    </span>
                                                    </div>
                                                @endif
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
                <div class="ta-c bdT w-100 p-20 d-flex" style="justify-content: end">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                <div class="peer peer-greed">
                                    <h5>Có tổng {{$articles->count()}} bài viết trên hệ thống</h5>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-20">
                        @if($articles->count() > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class=" bdwT-0">Mã</th>
                                    <th class=" bdwT-0">Tiêu đề</th>
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
                                            <td class="fw-600"><a href="{{ route('post.detail',$article->slug) }}">{{ $article->title }}</a></td>
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
                                            <td class="text-end d-flex" style="justify-content: end">
                                                @if($article->status == 1)
                                                <span class="badge bgc-red-50 c-red-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn__unconfirm__article"
                                                      data-id="{{ $article->id }}">Từ chối
                                                </span> &nbsp;
                                                @elseif($article->status == 0 || $article->status == 2)
                                                <span class="badge bgc-green-50 c-green-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn__confirm__article"
                                                      data-id="{{ $article->id }}">Duyệt
                                                </span>
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

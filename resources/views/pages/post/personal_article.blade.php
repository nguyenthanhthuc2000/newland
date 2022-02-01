@extends('layouts.master_layout')
@section('title')
    Bài viết cá nhân
@endsection
@section('main')

{{ Breadcrumbs::render('personal-article') }}

<form class="filter-bar row" action="{{ route('auth.article') }}" method="get">
    <div class="col-md-3">
        <select class="form-select py-2" aria-label="Status" name="trang-thai">
            <option {{ request()->get('trang-thai') == null ? 'selected' : '' }} disabled hidden>-- Trạng thái --</option>
            <option value="0" {{ request()->get('trang-thai') == '0' ? 'selected' : ''}}>Chờ duyệt</option>
            <option value="1" {{ request()->get('trang-thai') == '1' ? 'selected' : ''}}>Đã duyệt</option>
            <option value="2" {{ request()->get('trang-thai') == '2' ? 'selected' : ''}}>Đã hủy</option>
          </select>
    </div>
    <div class="col-md-3">
        <select class="form-select py-2" aria-label="Status" name="tinh-trang">
            <option {{ request()->get('tinh-trang') == null ? 'selected' : '' }} disabled hidden>-- Tình trạng --</option>
            <option value="0" {{ request()->get('tinh-trang') == '0' ? 'selected' : ''}}>Tin mới</option>
            <option value="1" {{ request()->get('tinh-trang') == '1' ? 'selected' : ''}}>Đã đặt cọc</option>
            <option value="2" {{ request()->get('tinh-trang') == '2' ? 'selected' : ''}}>Đã được bán</option>
            <option value="3" {{ request()->get('tinh-trang') == '3' ? 'selected' : ''}}>Đã được thuê</option>
          </select>
    </div>
    <div class="col-md-3">
        <button type="reset" class="btn btn-mute reload"><i class="fal fa-sync btn__filter"></i></button>
       <button class="btn btn-primary">Tìm kiếm</button>
    </div>
</form>

<div class="list-article">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã đự án</th>
                    <th scope="col">Tiêu đề</th>
                    {{-- <th scope="col">Ngày hết hạn</th> --}}
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tình trạng</th>
                    {{-- <th scope="col">Thống kê</th> --}}
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if ($personalArticle->count() == 0)
                    <th><strong>Khồng có dữ liệu</strong></th>
                @else
                    @foreach ($personalArticle as $i => $art)
                    @php
                        $img_article[] = $art->imagesArticle->toArray();
                        $img = $img_article[$i] ? $img_article[$i][0]['image'] : '';
                    @endphp
                    <tr>
                        <th scope="row">{{ numericalOrder($i) }}</th>
                        <th>{{ $art->private_code }}</th>
                        <td>
                            <div class="card card-article">
                                <div class="row g-0 flex-nowrap">
                                    <div class="col-4 card-img">
                                        <img src="{{ getUrlImageUpload($img) }}" class="img-fluid rounded-start" alt="{{ $art->title }}">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <a class="card-title stretched-link text-truncate" href="{{ route('post.detail',$art->slug) }}">{{ $art->title }}</a>
                                            <p class="card-text">{{ $art->sub_title }}</p>
                                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        {{-- <td>{{ $art->end_day }}</td> --}}
                        <td>
                            <span class="{{ ($art->status == 0) ?
                                                'status-unverified' :
                                                ($art->status == 1 ?
                                                    'status-verified' :
                                                    'status-cancel')}}">
                                {{
                                    ($art->status == 0) ?
                                        'Chưa được duyệt' :
                                        ($art->status == 1 ?
                                            'Đã được duyệt' :
                                            'Đã hủy')
                                }}
                            </span>
                            @if ($art->status == 2)
                                <span class="text-danger btn-attention attention" data-msg="{{ $art->feedback }}"
                                        data-id="{{ $art->id }}" title="Nhấn để xem lí do"><i class="fas fa-info"></i></span>
                            @endif
                        </td>
                        {{-- <td>{{ $art->end_day }}</td> --}}
                        <td>
                            <select class="form-select p-1" aria-label="state" name="state" id="state" data-id="{{ $art->id }}" {{ $art->status == 2 ? 'disabled' : '' }}>
                                <option value="0" {{ $art->state == '0' ? 'selected' : ''}}>Tin mới</option>
                                <option value="1" {{ $art->state == '1' ? 'selected' : ''}}>Đã đặt cọc</option>
                                <option value="2" {{ $art->state == '2' ? 'selected' : ''}}>Đã được bán</option>
                                <option value="3" {{ $art->state == '3' ? 'selected' : ''}}>Đã được thuê</option>
                                @if ( $art->status == 2 )
                                    <option selected>Đã bị hủy</option>
                                @endif
                            </select>
                        </td>
                        <td class="actions">
                            <div class="btn-group">
                                <button type="button" class="btn" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    {{-- <li class="dropdown-item"><i class="fas fa-sync-alt"></i> Bật tự động đăng lại</li> --}}
                                    <li class="dropdown-item"><a href="{{ route('post.edit', $art->id) }}" class="dropdown-link text-secondary"><i class="far fa-edit"></i> Sửa tin</a></li>
                                    {{-- <li class="dropdown-item"><i class="far fa-copy"></i> Sao chép tin đăng</li> --}}
                                    {{-- <li class="dropdown-item"><i class="fas fa-phone-alt"></i> Yêu cầu liên hệ</li> --}}
                                    {{-- <li class="dropdown-item"><i class="fas fa-id-card-alt"></i> Thống kê tương tác</li> --}}
                                    {{-- <li class="dropdown-item"><i class="far fa-sticky-note"></i> Ghi chú</li> --}}
                                    {{-- <li class="dropdown-item"><i class="fas fa-expand-alt"></i> Xem tin đăng trên website</li> --}}
                                    <li class="dropdown-item"><a data-href="{{ route('post.destroy', $art->id) }}" role="button" class="dropdown-link text-danger btn-destroy"><i class="fas fa-trash-alt"></i> Xóa tin</a></li>
                                </ul>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @if ($personalArticle->count() > 0)
        <div class="pagination justify-content-end">
            {{ $personalArticle->links() }}
        </div>
    @endif
</div>

@push('scripts')

    @if (session('msg'))
        <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{!! session('status') !!}',
                    title: '{!! session('msg') !!}',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
    @endif
@endpush
@endsection

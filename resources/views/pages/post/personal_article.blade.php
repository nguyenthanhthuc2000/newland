@extends('layouts.master_layout')
@section('title')
    Bài viết cá nhân
@endsection
@section('main')

{{ Breadcrumbs::render('personal-article') }}
<div class="list-article">
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
                            <div class="row g-0">
                                <div class="col-md-4 card-img " >
                                    <img src="{{ getUrlImageUpload($img) }}" class="img-fluid rounded-start" alt="{{ $art->title }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a class="card-title stretched-link" href="{{ route('post.detail',$art->slug) }}">{{ $art->title }}</a>
                                        <p class="card-text">{{ $art->sub_title }}</p>
                                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- <td>{{ $art->end_day }}</td> --}}
                    <td>
                        {{
                            ($art->status == 0) ?
                                'Chưa được duyệt' :
                                ($art->status == 1 ?
                                    'Đã được duyệt' :
                                    'Đã hủy')
                        }}
                    </td>
                    {{-- <td>{{ $art->end_day }}</td> --}}
                    <td>
                        <select class="form-select p-1" aria-label="state" name="state" id="state" data-id="{{ $art->id }}">
                            <option value="0" selected>Tin mới</option>
                            <option value="1">Đã đặt cọc</option>
                            <option value="2">Đã được bán</option>
                            <option value="3">Đã được thuê</option>
                            </select>
                    </td>
                    <td class="actions">
                        <div class="btn-group">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <li class="dropdown-item"><a href="{{ route('post.destroy', $art->id) }}" class="dropdown-link text-danger"><i class="fas fa-trash-alt"></i> Xóa tin</a></li>
                            </ul>
                            </div>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
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

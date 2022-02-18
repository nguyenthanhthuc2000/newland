@extends('layouts.master_layout')
@section('title')
    Dự  án đã đăng
@endsection
@section('main')

    {{ Breadcrumbs::render('personal-article') }}

    <form class="filter-bar row" action="{{ route('auth.project') }}" method="get">
        <div class="col-md-3 m-1">
            <select class="form-select py-2" aria-label="Status" name="trang-thai">
                <option {{ request()->get('trang-thai') == null ? 'selected' : '' }} disabled hidden>-- Trạng thái --</option>
                <option value="0" {{ request()->get('trang-thai') == '0' ? 'selected' : ''}}>Chờ duyệt</option>
                <option value="1" {{ request()->get('trang-thai') == '1' ? 'selected' : ''}}>Đã duyệt</option>
                <option value="2" {{ request()->get('trang-thai') == '2' ? 'selected' : ''}}>Đã từ chối</option>
            </select>
        </div>
        <div class="col-md-3 m-1">
            <select class="form-select py-2" aria-label="Status" name="tinh-trang">
                <option {{ request()->get('tinh-trang') == null ? 'selected' : '' }} disabled hidden>-- Tình trạng --</option>
                <option value="0" {{ request()->get('tinh-trang') == '0' ? 'selected' : ''}}>Tin mới</option>
                <option value="1" {{ request()->get('tinh-trang') == '1' ? 'selected' : ''}}>Đã đặt cọc</option>
                <option value="2" {{ request()->get('tinh-trang') == '2' ? 'selected' : ''}}>Đã được bán</option>
                <option value="3" {{ request()->get('tinh-trang') == '3' ? 'selected' : ''}}>Đã được thuê</option>
            </select>
        </div>
        <div class="col-md-3 m-1">
            <button type="reset" class="btn btn-mute reload"><i class="fal fa-sync btn__filter"></i></button>
            <button class="btn btn-primary">Tìm kiếm</button>
            <a href="http://127.0.0.1:8000/dang-tin" class="btn btn__outline__blue btn__auth" type="submit">
                Thêm mới
            </a>
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
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if ($personalProject->count() == 0)
                    <th><strong>Không có dữ liệu</strong></th>
                @else
                        <tr>
                            <th scope="row"></th>
                            <th></th>
                            <td>
                                <div class="card card-article">
                                    <div class="row g-0 flex-nowrap">
                                        <div class="col-4 card-img">
                                            <img src="" class="img-fluid rounded-start" alt="">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <a class="card-title stretched-link text-truncate" href=""></a>
                                                <p class="card-text"></p>
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{-- <td>{{ $art->end_day }}</td> --}}
                            <td>
                            <span class="">
                            </span>
                                    <span class="text-danger btn-attention attention" data-msg=""
                                          data-id="" title="Nhấn để xem lí do"><i class="fas fa-info"></i></span>
                            </td>
                            {{-- <td>{{ $art->end_day }}</td> --}}
                            <td>
                                <select class="form-select p-1" aria-label="state" name="state" id="state" data-id="">
                                    <option value="0" >Tin mới</option>
                                    <option value="1" >Đã đặt cọc</option>
                                    <option value="2" >Đã được bán</option>
                                    <option value="3" >Đã được thuê</option>
                                </select>
                            </td>
                            <td class="actions">
                                <div class="btn-group">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        {{-- <li class="dropdown-item"><i class="fas fa-sync-alt"></i> Bật tự động đăng lại</li> --}}
                                        <li class="dropdown-item"><a href="" class="dropdown-link text-secondary"><i class="far fa-edit"></i> Sửa tin</a></li>
                                        {{-- <li class="dropdown-item"><i class="far fa-copy"></i> Sao chép tin đăng</li> --}}
                                        {{-- <li class="dropdown-item"><i class="fas fa-phone-alt"></i> Yêu cầu liên hệ</li> --}}
                                        {{-- <li class="dropdown-item"><i class="fas fa-id-card-alt"></i> Thống kê tương tác</li> --}}
                                        {{-- <li class="dropdown-item"><i class="far fa-sticky-note"></i> Ghi chú</li> --}}
                                        {{-- <li class="dropdown-item"><i class="fas fa-expand-alt"></i> Xem tin đăng trên website</li> --}}
                                        <li class="dropdown-item"><a data-href="" role="button" class="dropdown-link text-danger btn-destroy"><i class="fas fa-trash-alt"></i> Xóa tin</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                @endif
                </tbody>
            </table>
        </div>
        @if ($personalProject->count() > 0)
            <div class="paginate-styling">
                {{ $personalProject->links() }}
            </div>
        @endif
    </div>
@endsection

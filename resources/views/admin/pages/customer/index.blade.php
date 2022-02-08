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
                                    <h5>Có tổng {{$customers->count()}} khách <hàng></hàng> trên hệ thống</h5>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-20">
                            @if($customers->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">ID</th>
                                        <th class=" bdwT-0">Khách hàng</th>
                                        <th class=" bdwT-0 text-center">Loại tài khoản</th>
                                        <th class=" bdwT-0 text-center">Điện thoại</th>
                                        <th class=" bdwT-0 text-center">Email</th>
                                        <th class=" bdwT-0 text-center">Số dư (vnđ)</th>
                                        <th class=" bdwT-0 text-center">Bài viết</th>
                                        <th class=" bdwT-0 text-center">Trạng thái</th>
                                        <th class=" bdwT-0 text-end">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td class="fw-600">{{ $customer->id }}</td>
                                            <td class="fw-600"><a href="{{ route('admin.profile.customer', encrypt_decrypt($customer->id)) }}">{{ $customer->name }}</a></td>
                                            <td class="fw-600 text-center">{{ $customer->account_type == 0 ? 'Cá nhân' : 'Công ty'}}</td>
                                            <td class="fw-600 text-center">
                                                @if($customer->phone != null)
                                                   {{ $customer->phone }}
                                                @else
                                                    <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                                @endif
                                            </td>
                                            <td class="fw-600">
                                                @if($customer->email != null)
                                                    {{ $customer->email }}
                                                @else
                                                    <span class="badge rounded-pill bg-danger lh-0 p-10">Chưa cập nhật</span>
                                                @endif
                                            </td>
                                            <td class="fw-600 text-center">{{ formatNumber($customer->surplus) }} </td>
                                            <td class="fw-600 text-center"><a href="">{{ count($customer->articles) }}</a>
                                            </td>
                                            <td class="fw-600 text-center">
                                                <div class="form-check form-switch text-center">
                                                    <input class="form-check-input update-status-user" type="checkbox" data-id="{{$customer->id}}"
                                                           id="flexSwitchCheckDefault" {{ $customer->status == 1 ? 'checked' : '' }}>
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
                <div class="ta-c bdT w-100 p-20 d-flex" style="justify-content: end">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6">

        </div>
        <div class="masonry-item col-md-12">
            <div class="bd bgc-white">
                <div class="layers">
                    <div class="layer w-100">
                        <div class="bgc-light-blue-500 c-white p-10">
                            <div class="peers ai-c jc-sb gap-40">
                                <div class="peer peer-greed">
                                    <h5>Có tổng {{$followers->count()}} người đăng kí nhận tin trên hệ thống</h5>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-20">
                            @if($followers->count() > 0)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class=" bdwT-0">ID</th>
                                        <th class=" bdwT-0">Email</th>
                                        <th class=" bdwT-0 text-center">Thời gian</th>
                                        <th class=" bdwT-0 text-end">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($followers as $follower)
                                        <tr>
                                            <td class="fw-600">{{ $follower->id }}</td>
                                            <td class="fw-600"><a href="#">{{ $follower->email }}</a></td>
                                            <td class="fw-600 text-center">{{ formatTime($follower->created_at) }} </td>
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
                    {{ $followers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                    <h5>Dự án</h5>
                                </div>
                                @if($auto == 'tu-dong')
                                <a href="{{ route('project.crawl') }} " class="btn__header__page btn"><i class="fal fa-plus"></i> Cập nhật</a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive p-20">
                            @if($projects->count() > 0)
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
                                    @foreach($projects as $project)
                                        <tr>
                                            <td class="fw-600">{{ strtoupper($project->code) }}</td>
                                            <td class="max-w-100">
                                                <img class="img__table" target="_blank" src="{{ getImageCrawl($project->photo, $project->crawl, 'project') }}">
                                                {{--                                                <img class="img__table" target="_blank" src="{{ $n->photo }}">--}}
                                            </td>
                                            <td class="fw-600"><a href="{{ route('project.detail', $project->slug) }}" class="text-split-2">{{ $project->name }}</a></td>
                                            <td>
                                            {{ formatTime($project->created_at) }}
                                            <td class="text-center">
                                                <div class="form-check form-switch text-center">
                                                    <input class="form-check-input update-status-project" type="checkbox" data-id="{{$project->id}}"
                                                           id="flexSwitchCheckDefault" {{ $project->status == 1 ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td class="text-end " style="">
                                                <div style="display: flex;    justify-content: end;">
                                                    <a href="{{ route('project.edit', encrypt_decrypt($project->id)) }}" class="badge bgc-green-50 c-green-700 p-15 lh-0 tt-c rounded-pill btn__confirm m-1"
                                                       data-id="{{ $project->id }}">Sửa
                                                    </a>
                                                    <a  href="{{ route('project.destroy', $project->id) }}" class="badge bgc-red-50 c-red-700 p-15 lh-0 tt-c rounded-pill btn__confirm btn_destroy_project m-1"
                                                        data-id="{{ $project->id }}">Xóa
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
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

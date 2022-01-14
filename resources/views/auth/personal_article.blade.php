@extends('layouts.master_layout')
@section('main')

{{ Breadcrumbs::render('personal-article') }}
<div class="list-article">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
          data-bs-target="#allArticle" type="button" role="tab" aria-controls="allArticle" aria-selected="true">Tất cả ({{ count($personalArticle) }})</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
          data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
          data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
      </ul>
      <div class="tab-content" id="personalArticle">
        <div class="tab-pane fade show active" id="allArticle" role="tabpanel" aria-labelledby="allArticle-tab">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã đự án</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Ngày hết hạn</th>
                    <th scope="col">Thống kê</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($personalArticle as $art)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{ $art->title }}</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>
</div>
@endsection

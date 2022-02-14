<div class="sidebar">
    <div class="sidebar-inner">
      <!-- ### $Sidebar Header ### -->
      <div class="sidebar-logo">
        <div class="peers ai-c fxw-nw">
          <div class="peer peer-greed">
            <a class="sidebar-link td-n" href="{{ route('home.index') }}">
              <div class="peers ai-c fxw-nw">
                <div class="peer">
                  <div class="logo">
                    <img style="width: 70px" src="{{ getUrlImageUpload($settings ? $settings->logo : '', 'setting', 'nologo.jpg') }}" alt="">
                  </div>
                </div>
                <div class="peer peer-greed">
                  <h5 class="lh-1 mB-0 logo-text" style="text-transform: uppercase; color: #2980b9;">{{$settings->domain}}</h5>
                </div>
              </div>
            </a>
          </div>
          <div class="peer">
            <div class="mobile-toggle sidebar-toggle">
              <a href="" class="td-n">
                <i class="ti-arrow-circle-left"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ### $Sidebar Menu ### -->
      <ul class="sidebar-menu scrollable pos-r">
        <li class="nav-item mT-30 actived">
          <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
            <span class="icon-holder">
              <i class="c-blue-500 ti-home"></i>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>
          <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
                <i class="c-red-500 ti-files"></i>
              </span>
                  <span class="title">Bất động sản</span>
                  <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <a class='sidebar-link' href="{{ route('category.manage') }}">Danh mục</a>
                  </li>
                  <li>
                      <a class='sidebar-link' href="{{ route('article.list') }}">Bài viết</a>
                  </li>
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                  <span class="icon-holder"><i class="c-indigo-500 ti-bar-chart"></i> </span>
                  <span class="title">Người dùng</span>
                  <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <a class='sidebar-link' href="{{ route('admin.list.customer') }}">Khách hàng</a>
                  </li>
                  <li>
                      <a class='sidebar-link' href="{{ route('admin.list.followers') }}">Người đăng kí nhận tin</a>
                  </li>
                  <li>
                      <a class='sidebar-link' href="#">Nhân viên hệ thống</a>
                  </li>
                  <li>
                      <a class='sidebar-link' href="#">Lịch sử giao dịch</a>
                  </li>
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                  <span class="icon-holder"><i class="c-light-blue-500 ti-pencil"></i> </span>
                  <span class="title">Tin tức</span>
                  <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <a class='sidebar-link' href="{{ route('news.manage') }}">Danh sách</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="javascript:void(0);">
                          <span>Quy định, hướng dẩn</span>
                          <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ route('news.edit.type', 'nap-tien') }}">Nạp tiền</a>
                          </li>
                          <li>
                              <a href="{{ route('news.edit.type', 'noi-quy-dang-bai') }}">Nội quy đăng bài</a>
                          </li>
                          <li>
                              <a href="{{ route('news.edit.type', 'chinh-sach') }}">Chính sách</a>
                          </li>
                          <li>
                              <a href="{{ route('news.edit.type', 'quy-dinh') }}">Quy định</a>
                          </li>
                          <li>
                              <a href="{{ route('news.edit.type', 'tai-khoan-ca-nhan') }}">Tài khoản cá nhân</a>
                          </li>
                          <li>
                              <a href="{{ route('news.edit.type', 'tai-khoan-cong-ty') }}">Tài khoản công ty</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                  <span class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> </span>
                  <span class="title">Cài đặt</span>
                  <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <a class='sidebar-link' href="{{ route('admin.setting') }}">Thông tin website</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="javascript:void(0);">
                          <span>Hình ảnh</span>
                          <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ route('admin.sliders') }}">Slider</a>
                          </li>
                          <li>
                              <a href="{{ route('admin.banners') }}">Banner</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
{{--        <li class="nav-item">--}}
{{--          <a class='sidebar-link' href="chat.html">--}}
{{--            <span class="icon-holder">--}}
{{--              <i class="c-deep-purple-500 ti-comment-alt"></i>--}}
{{--            </span>--}}
{{--            <span class="title">Chat</span>--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--          <a class='sidebar-link' href="charts.html">--}}
{{--            <span class="icon-holder">--}}
{{--              <i class="c-indigo-500 ti-bar-chart"></i>--}}
{{--            </span>--}}
{{--            <span class="title">Charts</span>--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--          <a class='sidebar-link' href="forms.html">--}}
{{--            <span class="icon-holder">--}}
{{--              <i class="c-light-blue-500 ti-pencil"></i>--}}
{{--            </span>--}}
{{--            <span class="title">Forms</span>--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--          <a class="sidebar-link" href="ui.html">--}}
{{--            <span class="icon-holder">--}}
{{--                <i class="c-pink-500 ti-palette"></i>--}}
{{--              </span>--}}
{{--            <span class="title">UI Elements</span>--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--          <a class="dropdown-toggle" href="javascript:void(0);">--}}
{{--            <span class="icon-holder">--}}
{{--              <i class="c-orange-500 ti-layout-list-thumb"></i>--}}
{{--            </span>--}}
{{--            <span class="title">Tables</span>--}}
{{--            <span class="arrow">--}}
{{--              <i class="ti-angle-right"></i>--}}
{{--            </span>--}}
{{--          </a>--}}
{{--          <ul class="dropdown-menu">--}}
{{--            <li>--}}
{{--              <a class='sidebar-link' href="basic-table.html">Basic Table</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--              <a class='sidebar-link' href="datatable.html">Data Table</a>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--          <a class="dropdown-toggle" href="javascript:void(0);">--}}
{{--            <span class="icon-holder">--}}
{{--                <i class="c-purple-500 ti-map"></i>--}}
{{--              </span>--}}
{{--            <span class="title">Maps</span>--}}
{{--            <span class="arrow">--}}
{{--                <i class="ti-angle-right"></i>--}}
{{--              </span>--}}
{{--          </a>--}}
{{--          <ul class="dropdown-menu">--}}
{{--            <li>--}}
{{--              <a href="google-maps.html">Google Map</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--              <a href="vector-maps.html">Vector Map</a>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item dropdown">--}}
{{--          <a class="dropdown-toggle" href="javascript:void(0);">--}}
{{--            <span class="icon-holder">--}}
{{--              <i class="c-teal-500 ti-view-list-alt"></i>--}}
{{--            </span>--}}
{{--            <span class="title">Multiple Levels</span>--}}
{{--            <span class="arrow">--}}
{{--              <i class="ti-angle-right"></i>--}}
{{--            </span>--}}
{{--          </a>--}}
{{--          <ul class="dropdown-menu">--}}
{{--            <li class="nav-item dropdown">--}}
{{--              <a href="javascript:void(0);">--}}
{{--                <span>Menu Item</span>--}}
{{--              </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--              <a href="javascript:void(0);">--}}
{{--                <span>Menu Item</span>--}}
{{--                <span class="arrow">--}}
{{--                  <i class="ti-angle-right"></i>--}}
{{--                </span>--}}
{{--              </a>--}}
{{--              <ul class="dropdown-menu">--}}
{{--                <li>--}}
{{--                  <a href="javascript:void(0);">Menu Item</a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                  <a href="javascript:void(0);">Menu Item</a>--}}
{{--                </li>--}}
{{--              </ul>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </li>--}}
      </ul>
    </div>
  </div>

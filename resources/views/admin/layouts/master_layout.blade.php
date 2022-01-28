<!DOCTYPE html>
<html>
  @include('admin.layouts.head')

  <body class="app">
    <!-- @TOC -->
    <!-- =================================================== -->
    <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

    <!-- @Page Loader -->
    <!-- =================================================== -->
    @include('admin.layouts.loader')

    <!-- @App Content -->
    <!-- =================================================== -->
    <div>
      <!-- #Left Sidebar ==================== -->

      @include('admin.layouts.sidebar')

      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        <div class="header navbar">
          <div class="header-container">
            <ul class="nav-left">
              <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                  <i class="ti-menu"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-bs-toggle="dropdown">
                  <div class="peer mR-10">
                    <img class="w-2r bdrs-50p" style="width: 40px; height: 40px" src="{{ getUrlImageUpload(Auth::user()->avatar , 'avatar', 'non_avatar.jpg') }}" alt="">
                  </div>
                  <div class="peer">
                    <span class="fsz-sm c-grey-900">{{ Auth::user()->name }}</span>
                  </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
{{--                  <li>--}}
{{--                    <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
{{--                      <i class="ti-settings mR-10"></i>--}}
{{--                      <span>Setting</span>--}}
{{--                    </a>--}}
{{--                  </li>--}}
{{--                  <li>--}}
{{--                    <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
{{--                      <i class="ti-user mR-10"></i>--}}
{{--                      <span>Profile</span>--}}
{{--                    </a>--}}
{{--                  </li>--}}
{{--                  <li>--}}
{{--                    <a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
{{--                      <i class="ti-email mR-10"></i>--}}
{{--                      <span>Messages</span>--}}
{{--                    </a>--}}
{{--                  </li>--}}
{{--                  <li role="separator" class="divider"></li>--}}
                  <li>
                    <a href="{{ route('auth.get.logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-power-off mR-10"></i>
                      <span>Đăng xuất</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
                @yield('content')
          </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2021 {{$settings->name}}  </span>
        </footer>
      </div>
    </div>
    @include('admin.layouts.script')
    @stack('js')
  </body>
</html>

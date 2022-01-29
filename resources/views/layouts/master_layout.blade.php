<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->
@include("layouts.head")
<body>
    <!-- header -->
        @include("layouts.header")
    <!-- end header -->


     <!-- filter -->
     @include("layouts.filter")
     <!-- end filter -->

    <!-- slider-->
    @if( request()->route()->getName() == 'home.index')
    @include("layouts.slider")
    @endif
    <!-- end slider-->

    <!-- main -->
    <main>
        <div class="container">
            @yield('main')
        </div>
    </main>
    <!-- end main -->

    <!-- footer -->
    @include('layouts.footer')
    <!-- end footer -->
    @include('layouts.modal')

    <!-- script -->
{{--    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>--}}
    @include('layouts.script')

    @stack('scripts')
</body>

</html>

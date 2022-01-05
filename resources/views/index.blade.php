<!DOCTYPE html>
<html lang="en">
<!-- HEAD -->
@include("layouts.head")
<body>
    <!-- header -->
        @include("layouts.header")
    <!-- end header -->

    <!-- main -->
    <main>
        <div class="container">
            @yield('main')
        </div>
    </main>
    <!-- end main -->

    <!-- footer -->
    <footer>

    </footer>
    <!-- end footer -->

    <!-- script -->
    @include('layouts.script')
    @include('layouts.modal')
    <!-- end script -->
</body>

</html>

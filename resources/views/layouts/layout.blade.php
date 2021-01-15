<!DOCTYPE html>
<html>
    @include('components.head')
<body>
    <!-- navbar -->
    @include('components.nav')
    <!-- /navbar-->
    @yield('content')
    @include('components.footer')
</body>
</html>
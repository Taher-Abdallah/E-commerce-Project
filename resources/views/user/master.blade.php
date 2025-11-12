<!doctype html>
<html lang="en">

    @include('user.layouts.head')
@stack('css')
<body>

@include('user.layouts.header')


@yield('content')


@include('user.layouts.footer')


@include('user.layouts.scripts')
@stack('js')
</body>


</html>

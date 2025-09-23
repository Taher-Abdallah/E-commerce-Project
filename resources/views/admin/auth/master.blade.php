<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
@include('admin.auth.layouts.head')
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- fixed-top-->
  @include('admin.auth.layouts.nav')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @yield('content')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
@include('admin.auth.layouts.footer')
 @include('admin.auth.layouts.script')
</body>
</html>


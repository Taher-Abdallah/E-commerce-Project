<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is flexible, clean & modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, dashboard, bootstrap, ecommerce, responsive admin panel">
  <meta name="author" content="PIXINVENT">

  <title>E-Commerce | @yield('title')</title>

  <!-- Icons -->
  <link rel="apple-touch-icon" href="{{ asset('admin-assets/images/careative.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin-assets/images/careative.png') }}" >

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('admin-assets/vendors/css/weather-icons/climacons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/fonts/meteocons/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/vendors/css/charts/chartist.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/fonts/simple-line-icons/style.css') }}">

  {{-- RTL / LTR SWITCH --}}
  @if (Config::get('app.locale') == 'ar')
      <!-- RTL -->
      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/vendors.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/app.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/custom-rtl.css') }}">

      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/core/colors/palette-gradient.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/pages/timeline.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css-rtl/pages/dashboard-ecommerce.css') }}">
  @else
      <!-- LTR -->
      <link rel="stylesheet" href="{{ asset('admin-assets/css/vendors.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">

      <link rel="stylesheet" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css/core/colors/palette-gradient.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css/pages/timeline.css') }}">
      <link rel="stylesheet" href="{{ asset('admin-assets/css/pages/dashboard-ecommerce.css') }}">
  @endif

  {{-- Extra Plugins (Datatables, Select2, Fileinput) --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/2.0.4/css/colReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/4.0.1/css/fixedHeader.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/5.0.4/css/fixedColumns.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.4.3/css/scroller.dataTables.min.css">

  <!-- File Input -->
  <link rel="stylesheet" href="{{ asset('vendor/file-input/css/fileinput.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.3/css/fileinput.min.css">

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  @livewireStyles
</head>

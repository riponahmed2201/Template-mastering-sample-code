<head>
    <title>@yield('title', (auth()->user()->siteSetting->company_name ?? auth()->user()->member->siteSetting->company_name) . ' - Dashboard')</title>

    @yield('custom-meta')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/pace/themes/orange/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/clockpicker/bootstrap-clockpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/sweetalert2/sweetalert2.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/skins/sidebar-nav-darkgray.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/skins/navbar3.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">

    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">

</head>
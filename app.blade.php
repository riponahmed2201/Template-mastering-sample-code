<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}" class="fullscreen-bg">
@include('layouts.head')
<body class="layout-topnav">
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    @include('layouts.navbar')
    <!-- /NAVBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">

                @yield('content')

            <!-- END MAIN -->
        </div>
    </div>

    @include('layouts.sidebar')

            <div class="clearfix"></div>
            <footer>
                <div class="container-fluid">
                    <p class="copyright">&copy; 2019 <a href="{{ auth()->user()->siteSetting ? auth()->user()->siteSetting->url : '#'}}" target="_blank">{{ auth()->user()->siteSetting->company_name ?? auth()->user()->member->siteSetting->company_name }}</a>. All Rights Reserved.</p>
                </div>
            </footer>
</div>
        <!-- END WRAPPER -->

<!-- Footer Scripts -->
    @include('layouts.footer')

    @yield('custom-js')

</body>
</html>

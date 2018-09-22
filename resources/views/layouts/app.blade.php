<!DOCTYPE html>
<html>
<head>
    @include('layouts.includes.heads')
    @yield('css')
</head>

<body class="layout-top-nav skin-blue">
<div id="preloader" class='preloader'><div class='loaded'>&nbsp;</div></div>
<div class="wrapper">
    <!-- Main Header -->
    @include('layouts.includes.main_header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background: url('{{asset('images/ferreteria-banner.jpg')}}')">
        <div class="container">
            <section class="content-header">
                @yield('contentHeader')
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright © {{Date('Y')}} | <a href="http://www.cal-webdes.com">Cal-Webdes</a>.</strong> All rights reserved.
    </footer>

</div>

@include('layouts.includes.scripts')
<script>
    $(window).on('load',function() {
        $(".preloader").fadeOut("slow");
    });
    $('.btnLoader').on('click',function () {
        $(".preloader").fadeIn("slow");
    });
</script>
@yield('scripts')
</body>
</html>
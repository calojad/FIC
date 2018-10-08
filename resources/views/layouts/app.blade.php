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
    <div class="content-wrapper contenido-w-mt">
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
    <footer id="status" class="footer-gray footer-fixed-bottom">
        <div class="col-md-3 sombra-interna">
            <a style="cursor: pointer"><i class="fa fa-circle text-success"></i> Online</a>
            <span> - {{Auth::user()->username}}</span>
            <span class="pull-right"> {{Date('d/M/Y')}}</span>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-3 sombra-interna">
            <span>© FIC - <a href="http://www.cal-webdes.com">Cal-Webdes</a> - All right's reserved</span>
        </div>
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
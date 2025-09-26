<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App">
<div id="preloader"></div>

<div class="main-wrapper">
    @include('site.partials.header')
    @yield('content')
    @include('site.partials.footer')


</div>

<script>
    window.APP_LOGO = {
        default: @json( optional($config->image_back)->path ? $config->image_back->path : asset('img/logos/logo.png') ),
        inner:  @json( optional($config->image_back)->path ? $config->image_back->path : asset('img/logos/logo.png') ),
        fromConfig: @json( optional($config->image)->path ? $config->image->path : asset('img/logos/logo.png') )
    };
</script>

@include('site.partials.angular_mix')

<a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

<!-- jQuery -->
<script src="/site/js/jquery.min.js"></script>

<!-- popper js -->
<script src="/site/js/popper.min.js"></script>

<!-- bootstrap -->
<script src="/site/js/bootstrap.min.js"></script>

<!-- jquery -->
<script src="/site/js/core.min.js"></script>

<!-- Search -->
{{--<script src="/site/jssearch.js"></script>--}}

<!-- custom scripts -->
<script src="/site/js/main.js"></script>

<!-- form plugins js -->
<script src="/site/js/plugins.js"></script>

<!-- form scripts js -->
<script src="/site/js/scripts.js"></script>


    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>



    <script>
    </script>


    @stack('scripts')
</body>

</html>

@include('layouts.frontend.header')
<body>
    @if(!(isset($exception) && $exception->getStatusCode() == 404))
        @include('layouts.frontend.nav')
    @endif
    <div class="clearfix"></div>
	@yield('content')
    <div class="clearfix"></div>
    @include('layouts.frontend.footer')
</body>
</html>
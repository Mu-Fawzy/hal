@include('layouts.frontend.header')
<body>
	@include('layouts.frontend.nav')
    <div class="clearfix"></div>
	@yield('content')
    <div class="clearfix"></div>
    @include('layouts.frontend.footer')
</body>
</html>
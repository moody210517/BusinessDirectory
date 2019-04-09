<!DOCTYPE html>
<html class="no-js" lang="en">
<link rel="icon" href="icon location">

<head>
    @yield('title_and_meta')
    @include('user.common.header-script')
</head>

<body style="background:#d0d0d0;">
	@include('user.common.header')
    @yield('content')

    @include('user.common.footer')


    @include('user.common.footer-script')
    @yield('script')

</body>
</html>
<!-- footer section end
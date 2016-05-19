<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','EVENTSOFT Store')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('personal/store/css/main.css')}}">
</head>
<body>
    @if(\Session::has('message'))
     @include('store.partials.message')
    @endif
    @include('store.partials.nav')
	@yield('content')
	@include('store.partials.footer')
	<script src="{{ asset('plugins/bootstrap/js/jquery.min.js')}}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--Plugin Jquery Pinterest para cargar los productos-->
	<script src="{{ asset('plugins/pinterest/pinterest_grid.js')}}"></script>
	<script src="{{ asset('personal/store/js/main.js')}}"></script>
</body>
</html>
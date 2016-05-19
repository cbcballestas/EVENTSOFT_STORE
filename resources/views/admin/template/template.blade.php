<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>EVENTSOFT Store - Dashboard</title>
	<script src="{{ asset('plugins/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{ asset('personal/admin/js/highcharts.js')}}"></script>
    <script src="{{ asset('personal/admin/js/exporting.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('personal/admin/css/main.css')}}">
</head>
<body>
    @if(\Session::has('message'))
     @include('admin.partials.message')
    @endif
    @include('admin.partials.nav')
	@yield('content')
	@include('admin.partials.footer')
	<!--<script src="{{ asset('plugins/bootstrap/js/jquery.min.js')}}"></script>-->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('personal/admin/js/main.js')}}"></script>
</body>
</html>
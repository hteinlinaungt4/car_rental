<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/main.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('user/login/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/dataTables.bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/bootstrap-social.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/bootstrap-select.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/fileinput.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/awesome-bootstrap-checkbox.css')}}">
	<link rel="stylesheet" href="{{asset('user/login/css/style.css')}}">

</head>
<body>
    @yield('content')



	<script src="{{asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('auth/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('auth/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('auth/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('auth/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('auth/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('auth/js/main.js')}}"></script>



	<script src="{{asset('user/login/js/Chart.min.js')}}"></script>
	<script src="{{asset('user/login/js/fileinput.js')}}"></script>
	<script src="{{asset('user/login/js/chartData.js')}}"></script>
	<script src="{{asset('user/login/js/main.js')}}"></script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>{{config('app.name')}} - @yield('judul')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Google font -->
	<link href="{{asset('css/fonts.css')}}" rel="stylesheet">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Footer-with-logo.css')}}">

	<style>
		.section {
			position: relative;
			height: 100%;
		}

		.section .section-center {
			position: absolute;
			top: 50%;
			left: 0;
			right: 0;
			-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
		}
	</style>
</head>
<body>
	<div id="booking" class="content section">
		<!-- Ini adalah header dari folder yang berbeda -->
		@include('layouts.partials.header')
		<!-- Ini adalah content/page section -->
			<!-- status -->
			@if(session('status'))
			<div class="alert alert-success">
				<a href="#" id="alert-close" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('status') }}
			</div>

			<!-- error -->
			@elseif(session('error'))
			<div class="alert alert-danger">
				<a href="#" id="alert-close" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('error') }}
			</div>
			@endif
			
			@yield('content')
	</div>
	<!-- Ini adalah footer dari folder yang berbeda -->
	@include('layouts.partials.footer')

    <script src="{{asset('js/core/jquery.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/core/underscore-min.js')}}"></script>
    
</body>
</html>
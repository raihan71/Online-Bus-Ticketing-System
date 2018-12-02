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
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">

	<!-- Custom -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Footer-with-logo.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/default.date.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/default.time.css')}}">

	<!-- Script -->
	<script src="{{asset('js/core/jquery.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/core/underscore-min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
</head>
<body>
	<div class="content section bg-light">
		<!-- Ini adalah header dari folder yang berbeda -->
		@include('layouts.partials.header-user')
		<!-- Ini adalah content/page section -->
		@guest
			@yield('content')
		@else
			<div class="section-center container">
				<div class="row">
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
					@yield('first-left')
					@yield('first-right')
				</div>
			</div>
		@endguest
	</div>
	<!-- Ini adalah footer dari folder yang berbeda -->
	@include('layouts.partials.footer')
	<!-- Script -->
    @stack('scripts')
</body>
</html>
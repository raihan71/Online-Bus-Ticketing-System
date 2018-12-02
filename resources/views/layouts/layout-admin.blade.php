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
	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/default.date.css')}}">

	<!-- Bootstrap JavaScript -->
	<script src="{{asset('js/core/jquery.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/core/underscore-min.js')}}"></script>
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
				<div class="row">
					<div class="col-sm-3 col-md-3">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="fa fa-bars"></span> {{__('Menu')}}</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<ul class="list-group">
										<li class="list-group-item"><i class="fa fa-home text-dark"></i> 
											<a href="{{route('admin.home')}}" class="btn-link">{{__('Beranda')}}</a>
										</li>
										<li class="list-group-item"><i class="fa fa-ticket text-primary"></i> 
											<a href="{{route('admin.manage-ticket')}}" class="btn-link">{{__('Pengaturan Tiket')}}</a>
										</li>
										<li class="list-group-item"><i class="fa fa-check-square text-success"></i> 
											<a href="{{route('admin.manage-reservation')}}" class="btn-link">{{__('Pengaturan Reservasi')}}</a>
										</li>
										<li class="list-group-item"><i class="fa fa-clone text-warning"></i> 
											<a href="{{route('admin.manage-category')}}" class="btn-link">{{__('Pengaturan Kategori')}}</a>
										</li>
										<li class="list-group-item"><i class="fa fa-briefcase text-danger"></i> 
											<a href="{{route('admin.manage-brand')}}" class="btn-link">{{__('Pengaturan Brand')}}</a>
										</li>
										<li class="list-group-item"><i class="fa fa-group text-info"></i> 
											<a href="{{route('admin.manage-member')}}" class="btn-link">{{__('Pengaturan User')}}</a>
										</li>
										<li class="list-group-item"><i class="fa fa-newspaper-o text-dark"></i> 
											<a href="#" class="btn-link">{{__('News')}}</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="fa fa-file">
										</span> Reports</a>
									</h4>
								</div>
								<div id="collapseFour" class="panel-collapse collapse">
									<div class="list-group">
										<a href="#" class="list-group-item active">
											Cras justo odio
										</a>
										<a href="#" class="list-group-item">Dapibus ac facilisis in</a>
										<a href="#" class="list-group-item">Morbi leo risus</a>
										<a href="#" class="list-group-item">Porta ac consectetur ac</a>
										<a href="#" class="list-group-item">Vestibulum at eros</a>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="fa fa-heart">
										</span> Reports</a>
									</h4>
								</div>
								<div id="collapseFive" class="panel-collapse collapse">
									<div class="list-group">
										<a href="#" class="list-group-item">
											<h4 class="list-group-item-heading">List group item heading</h4>
											<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
										</a>
									</div>
									<div class="list-group">
										<a href="#" class="list-group-item active">
											<h4 class="list-group-item-heading">List group item heading</h4>
											<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
										</a>
									</div>
									<div class="list-group">
										<a href="#" class="list-group-item">
											<h4 class="list-group-item-heading">List group item heading</h4>
											<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@yield('content')
				</div>
			</div>
		@endguest
	</div>
	<!-- Ini adalah footer dari folder yang berbeda -->
	@include('layouts.partials.footer')

	<!-- DataTables -->
	<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

	<!-- App scripts -->
	@stack('scripts')
</body>
</html>
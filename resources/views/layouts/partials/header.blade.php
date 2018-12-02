<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">{{__('TravelQu')}}</a>
		</div>
			@if(Route::has('login'))
			<ul class="nav navbar-nav navbar-right">
				<li>
					@if(Auth::check())
					@if(Auth::user()->isAdmin())
					<li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i> {{__('Beranda')}}</a></li>
					@else
					<li><a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('Beranda')}}</a></li>
					@endif
				</li>
				@else
				<li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> {{__('Masuk')}}</a></li>
				<li><a href="{{route('register')}}"><i class="fa fa-group"></i> {{__('Daftar')}}</a></li>
				@endif
			</ul>
			@endif
		</div>
</nav>
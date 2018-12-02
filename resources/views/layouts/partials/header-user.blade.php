<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">{{__('TravelQu')}}</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			@guest
				<li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> {{__('Masuk')}}</a></li>
				<li><a href="{{route('register')}}"><i class="fa fa-group"></i> {{__('Daftar')}}</a></li>
			@else
				@if(Auth::user()->isAdmin() == false)
				<li><a href="{{route('home')}}"><i class="fa fa-home"></i> {{__('Beranda')}}</a></li>
				@else
				<li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i> {{__('Beranda')}}</a></li>
				@endif
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li>
							@if(Auth::user()->isAdmin() == false)
							<a href="{{route('user.profile')}}">Profil Saya</a>
							<a href="{{route('user.my-ticket.all')}}">My Ticket</a>
							@else
							<a href="{{route('admin.profile')}}">Profil Saya</a>
							@endif
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
					</ul>
				</li>
			@endguest
		</ul>
	</div>
</nav>
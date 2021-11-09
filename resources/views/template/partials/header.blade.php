<section class="bg-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" style="color: black" href="{{ route('front.main') }}"><i class="fa fa-home"></i>&nbsp;Home</a>
							</li>
							<li class="nav-item" @guest ? style="display: none;" : style="display: block;" @endguest>
								<a class="nav-link" href="{{ route('home') }}"><i class="fa fa-user"></i>&nbsp;Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('front.define') }}"><i class="fa fa-info-circle"></i>&nbsp;นิยาม</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('front.shirt.label') }}"><i class="fa fa-picture-o"></i>&nbsp;ป้ายเสื้อ</a>
							</li>
						</ul>
						@guest
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link login-button" href="{{ route('login') }}">Login</a>
							</li>
						</ul>
						@else

							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a class="nav-link login-button" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
								</li>
							</ul>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>

						@endguest
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
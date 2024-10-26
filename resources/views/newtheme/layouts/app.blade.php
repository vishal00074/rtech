<!doctype html>
<html lang="en">
<head>
	@include('newtheme.include.head')
    @yield('css')

	<style>
		.btn{
			padding: 9px 15px !important;
		}
		.btn.btn-color {
			color: #000000;
    		background-color: #ffffff;
		}
		.btn.btn-color:hover {
			box-shadow: 0px 0px 37px 0px rgb(255 255 255 / 58%);
    		color: #ffffff;
			background-color: #000000;
			border-color: #ffffff;
		}
		.btn.btn-color-d {
			margin-top: 5% !important;
			width: 115px !important;
			color: #ffffff !important;
    		background-color: #000000 !important;
		}
		.btn.btn-color-d:hover {
			margin-top: 5% !important;
			width: 115px !important;
			box-shadow: 0px 0px 37px 0px rgb(189 180 180 / 58%);
    		color: #000000 !important;
			background-color: #ffffff !important;
			border-color: #000000 !important;
		}
	</style>
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="{{ url('/') }}" class="logo m-0 float-start">R Tech<span class="text-primary">.</span></a>
						</div>
						<div class="col-6 text-center">
							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="{{ url('/') }}">Home</a></li>
								<li class="has-children active">
									<a href="#">Gallery</a>
									<ul class="dropdown">
										<li><a href="{{url('earth_gallery')}}">Earth Gallery</a></li>
										<li><a href="{{url('/mars/gallery')}}">Mars Gallery</a></li>
										<li><a href="{{url('video_gallery')}}">Video Gallery</a></li>
										<li><a href="{{url('apod_gallery')}}">Cosmos Gallery</a></li>
									</ul>
								</li>
								<li><a href="{{url('/blogs')}}">Blogs</a></li>
								@auth
								    <li><a href="{{url('/create_blog')}}">Create Blog</a></li>
								@endif
								
								<li class="d-inline-block d-lg-none">
									@guest
										<a href="{{url('/login')}}" class="btn btn-sm btn-color-d">Login </a>
										<a href="{{url('/register')}}" class="btn btn-sm btn-color-d"> Register</a>
									@else
									    <a href="" class="profile-icon">
									        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 50px;"alt="Avatar" />
								        </a>
										<a href="{{url('/sign-out')}}" class="btn btn-sm btn-color-d">SignOut </a>
									@endif
								</li>
								
							</ul>
						</div>
						<div class="col-4 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>

							@guest
								<a href="{{url('/login')}}" class="d-none d-lg-inline-block btn btn-sm btn-color">Login </a>
								<a href="{{url('/register')}}" class="d-none d-lg-inline-block btn btn-sm btn-color"> Register</a>
							@else
								<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								    <li class="d-none d-lg-inline-block">
										<a href="" class="profile-icon">
										    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 50px;"alt="Avatar" />
										</a>
									</li>	
									<li class="has-children d-none d-lg-inline-block">
										<a href="" class="">{{auth()->user()->name ?? ''}}</a>
										<ul class="dropdown">
											<li>
												<a href="{{url('/sign-out')}}" class="d-none d-lg-inline-block">SignOut </a>
											</li>
										</ul>
									</li>									
								</ul>

								<!-- <span>{{auth()->user()->name ?? ''}}</span>
								<a href="{{url('/sign-out')}}" class="d-none d-lg-inline-block btn btn-sm btn-color">SignOut </a> -->
							@endif
							
							<!-- <form action="#" class="search-form d-none d-lg-inline-block">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div style="background-color:black">
		@yield('content')
	</div>


	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Company</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Vision</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="{{url('/blogs')}}">Blogs</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Creative</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">Recent Post Entry</h3>
						<div class="post-entry-footer">
							<ul>
								<li>
									<a href="">
										<img src="{{ asset('public/assets/newtheme/images/img_1_sq.jpg') }}" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="">
										<img src="{{ asset('public/assets/newtheme/images/img_2_sq.jpg') }}" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="">
										<img src="{{ asset('public/assets/newtheme/images/img_3_sq.jpg') }}" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>


					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed by <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>
				
    @include('newtheme.include.script')
    @yield('script')
	

	<script type="text/javascript">
        if ("{{ session('success') }}") {
            toastr.success("{{ session('success') }}", "Success", {
                positionClass: "toast-top-right",
            });
        }
        
        if ("{{ session('error') }}") {
            toastr.error("{{ session('error') }}", "Error", {
                positionClass: "toast-top-right",
            });
        }
        
        if ("{{ session('info') }}") {
            toastr.info("{{ session('info') }}", "Info", {
                positionClass: "toast-top-right",
            });
        }
        
        if ("{{ session('warning') }}") {
            toastr.warning("{{ session('warning') }}", "Warning", {
                positionClass: "toast-top-right",
            });
        }
    </script>

	
  </body>
  </html>

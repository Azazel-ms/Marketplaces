<!DOCTYPE html>
<html lang="en">
<head>
    <title>MERCADO CONTROL</title>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
<link rel="stylesheet" href="{{ asset(marketplaces/assets/fonts/feather.css) }}">
    <link rel="stylesheet" href="{{ asset(marketplaces/assets/fonts/fontawesome.css) }}">
    <link rel="stylesheet" href="{{ asset(marketplaces/assets/fonts/material.css) }}">
    <link rel="stylesheet" href="{{ asset(marketplaces/assets/css/style.css) }}">
    <link rel="stylesheet" href="{{ asset(marketplaces/assets/css/customizer.css) }}">
    @yield('headers')
</head>
<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="{{ asset(marketplaces/assets/images/logocompleto.png)}}" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="" class="b-brand">
					<img src="{{ asset(assets/images/logocompleto.png)}}" alt="" class="logo logo-lg" style="width: 130px; height: 60px;">					
				</a>
			</div>
			<div class="navbar-content">
				@include('partes.nav')
			</div>
		</div>
	</nav>
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="ms-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="material-icons-two-tone">search</i>
						</a>
						<div class="dropdown-menu dropdown-menu-end pc-h-dropdown drp-search">
							<form class="px-3">
								<div class="form-group mb-0 d-flex align-items-center">
									<i data-feather="search"></i>
									<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
								</div>
							</form>
						</div>
					</li>										
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name">Joseph William</span>
								<span class="user-desc">Administrator</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
							<div class=" dropdown-header">
								<h5 class="text-overflow m-0"><span class="badge bg-light-success">Pro</span></h5>
							</div>
							<a href="user-profile.html" class="dropdown-item">
								<i class="material-icons-two-tone">account_circle</i>
								<span>Profile</span>
							</a>

							<a href="auth-lockscreen.html" class="dropdown-item">
								<i class="material-icons-two-tone">https</i>
								<span>Lock Screen</span>
							</a>
							<a href="auth-signin-3.html" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<div class="pc-container">
	    <div class="pcoded-content">

	        <div class="page-header">
	            <div class="page-block">
	                <div class="row align-items-center">
	                    <div class="col-md-6">
	                        <div class="page-header-title">
	                            <h5 class="m-b-10">Dashboard sale</h5>
	                        </div>
	                        <ul class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	                            <li class="breadcrumb-item">Dashboard sale</li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-xl-12 col-md-12">
	                <div class="card feed-card">
	                    <div class="card-header">
	                        <h5>Feeds</h5>
	                    </div>
	                    <div class="feed-scroll" style="height:385px;position:relative;">
	                        <div class="card-body">
	                            <div class="row m-b-25 align-items-center">
	                                <div class="col-auto p-r-0">
	                                    <i data-feather="bell" class="bg-light-primary feed-icon p-2 wid-30 hei-30"></i>
	                                </div>
	                                <div class="col">
	                                    <a href="#!">
	                                        <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted float-end f-14">Just Now</span></h6>
	                                    </a>
	                                </div>
	                            </div>                                                       
	                        </div>
	                    </div>
	                </div>
	            </div>

	        </div>        
	    </div>
	</div>
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>    
	<script src="assets/js/plugins/apexcharts.min.js"></script>
	<script src="assets/js/pages/dashboard-sale.js"></script>
</body>
</html>

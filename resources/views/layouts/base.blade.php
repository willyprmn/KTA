<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ $title }}</title>
		<meta name="keywords" content="KTA, Kredit Tanpa Agunan" />
		<meta name="description" content="Kredit Tanpa Agunan Multi Bank">
		<meta name="author" content="Willy Permana">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/morris.js/morris.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="{{ asset('porto-admin') }}/assets/vendor/modernizr/modernizr.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			@include('layouts.navbar')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				@include('layouts.sidebar')
				<!-- end: sidebar -->

				<section role="main" class="content-body">
                              @include('layouts.topbar')

					<!-- start: page -->
					@yield('container')
					<!-- end: page -->
				</section>
			</div>

			<!-- <aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2016-04-19T00:00+00:00">04/19/2016</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="{{ asset('porto-admin') }}/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="{{ asset('porto-admin') }}/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="{{ asset('porto-admin') }}/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="{{ asset('porto-admin') }}/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside> -->

		</section>

		<!-- Vendor -->
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery/jquery.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-ui/jquery-ui.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-appear/jquery-appear.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/flot/jquery.flot.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/flot.tooltip/flot.tooltip.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/select2/js/select2.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-sparkline/jquery-sparkline.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/raphael/raphael.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/morris.js/morris.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/gauge/gauge.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/snap.svg/snap.svg.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/theme.init.js"></script>

		<!-- Examples -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/javascripts/tables/examples.datatables.tabletools.js"></script>

	</body>
</html>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
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
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="{{ asset('porto-admin') }}/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />

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
		<!-- start: page -->
            @yield('container')
		<!-- end: page -->

		<!-- Vendor -->
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery/jquery.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="{{ asset('porto-admin') }}/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="{{ asset('porto-admin') }}/assets/vendor/select2/js/select2.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ asset('porto-admin') }}/assets/javascripts/theme.init.js"></script>

	</body>
</html>
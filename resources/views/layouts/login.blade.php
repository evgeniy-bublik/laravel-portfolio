<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>@yield('title', '')</title>
		
        <!-- vector map CSS -->
		<link href="/admin-assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="/admin-assets/dist/css/style.css" rel="stylesheet">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper  pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="{{ route('admin.index') }}">
						<img class="brand-img mr-10" src="/admin-assets/img/logo.png" alt="brand"/>
						<span class="brand-text">Droopy</span>
					</a>
				</div>
				<div class="clearfix"></div>
			</header>

            @yield('content')
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="/admin-assets/dist/js/bootstrap.min.js"></script>
		<script src="/admin-assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="/admin-assets/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="/admin-assets/dist/js/init.js"></script>
	</body>
</html>

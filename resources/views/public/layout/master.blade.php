<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="saroven" />

	<!-- Stylesheets -->
	@include('public.layout.include.style')
	{{-- end stylesheed --}}

	@yield('style')
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>{{ config('app.name') }}</title>

</head>

<body class="stretched" >

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix" id="app">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo -->
					<div id="logo">
						<a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset('fontend/images/logo-dark.png') }}">
							<img src="{{ asset('img') }}/{{settings()->logo}}" alt="Canvas Logo">
						</a>
						<a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ asset('fontend/images/logo-dark@2x.png') }}"><img src="{{ asset('fontend/images/logo@2x.png') }}" alt="Canvas Logo"></a>
					</div>
					<!-- #logo end -->

					<!-- Primary Navigation-->
					@include('public.layout.include.navbar')
					<!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		@yield('top')

		<!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin">

						<!-- Shop-->
						@yield('content')
						<!-- #shop end -->

					</div>
					<!-- .postcontent end -->

					<!-- Sidebar-->

					@include('public.layout.include.sidebar')
					
					<!-- .sidebar end -->

				</div>

			</div>

		</section>
		<!-- #content end -->

		<!-- Footer -->
		
				@include('public.layout.include.footer')

		

		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	{{-- scripts --}}

	@include('public.layout.include.script')

	@yield('footer-script')

</body>
</html>
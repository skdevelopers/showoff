<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken"> -->
	<!-- Page Title -->
	<title>ShowOff | Discover the Difference </title>
	<!-- Favicon Icon -->
	<!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"> -->
	<!-- Google Fonts css-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Sora:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="{{asset('front/assets/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<!-- SlickNav css -->
	<link href="{{asset('front/assets/css/slicknav.min.css')}}" rel="stylesheet">
	<!-- Swiper css -->
	<link rel="stylesheet" href="{{asset('front/assets/css/swiper-bundle.min.css')}}">
	<!-- Font Awesome icon css-->
	<link href="{{asset('front/assets/css/all.min.css')}}" rel="stylesheet" media="screen">
	<link href="{{asset('front/assets/css/all.min.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
	<!-- Animated css -->
	<link href="{{asset('front/assets/css/animate.css')}}" rel="stylesheet">
	<!-- Magnific css -->
	<link href="{{asset('front/assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Main custom css -->
	<link href="{{asset('front/assets/css/custom.css')}}" rel="stylesheet" media="screen">
	<link href="{{asset('front/assets/css/my-custom.css')}}" rel="stylesheet" media="screen">
	<link href="{{asset('front/assets/css/custom/custom.css')}}" rel="stylesheet" media="screen">
	<link href="{{asset('front/assets/css/custom/style.css')}}" rel="stylesheet" media="screen">
	<link href="{{asset('front/assets/css/custom/main-layout.css')}}" rel="stylesheet" media="screen">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	@stack('styles')
</head>

<body class="tt-magic-cursor">

	<!-- Magic Cursor Start -->
	<div id="magic-cursor">
		<div id="ball"></div>
	</div>
	<!-- Magic Cursor End -->

	<!-- Header Start -->
	@include('front.partials.header')
	<!-- Header End -->

    <main class="content">
        @yield('content')
    </main>

	<!-- Footer Section Start -->
	@include('front.partials.footer')
	<!-- Footer Copyright Section End -->

	<!-- Jquery Library File -->
	<script src="{{asset('front/assets/js/jquery-3.7.1.min.js')}}"></script>
	<!-- Bootstrap js file -->
	<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
	<!-- Validator js file -->
	<script src="{{asset('front/assets/js/validator.min.js')}}"></script>
	<!-- SlickNav js file -->
	<script src="{{asset('front/assets/js/jquery.slicknav.js')}}"></script>
	<!-- Swiper js file -->
	<script src="{{asset('front/assets/js/swiper-bundle.min.js')}}"></script>
	<!-- Counter js file -->
	<script src="{{asset('front/assets/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('front/assets/js/jquery.counterup.min.js')}}"></script>
	<!-- Magnific js file -->
	<script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- SmoothScroll -->
	<script src="{{asset('front/assets/js/SmoothScroll.js')}}"></script>
	<!-- Parallax js -->
	<script src="{{asset('front/assets/js/parallaxie.js')}}"></script>
	<!-- MagicCursor js file -->
	<script src="{{asset('front/assets/js/gsap.min.js')}}"></script>
	<script src="{{asset('front/assets/js/magiccursor.js')}}"></script>
	<!-- Text Effect js file -->
	<script src="{{asset('front/assets/js/splitType.js')}}"></script>
	<script src="{{asset('front/assets/js/ScrollTrigger.min.js')}}"></script>
	<!-- Wow js file -->
	<script src="{{asset('front/assets/js/wow.js')}}"></script>
	<!-- Main Custom js file -->
	<script src="{{asset('front/assets/js/function.js')}}"></script>
    <!-- Optional JavaScript -->
    <script src="{{asset('front/assets/css/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/aos/aos.min.js')}}"></script>
	<!-- SlickNav js file -->
	<script src="{{asset('front/assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/macy/macy.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/simple-parallax/simpleParallax.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/OwlCarousel2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/theia-sticky-sidebar/ResizeSensor.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fileupload.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/ion.rangeSlider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/css/plugins/select2/select2.min.js')}}"></script>
	@stack('script')
</body>
</html>

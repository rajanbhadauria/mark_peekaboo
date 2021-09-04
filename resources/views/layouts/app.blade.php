<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('theme/css/fontawesome-all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('theme/font/flaticon.css') }}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('theme/theme.css') }}">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->      
    <section class="fxt-template-animation fxt-template-layout3" data-bg-image="{{ asset('theme/img/figure/bg3-r.jpg') }}">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-12 fxt-none-991">
					<div class="fxt-header">
						<div class="fxt-transformY-50 fxt-transition-delay-1">
							<a href="{{ route('login') }}" class="fxt-logo"><img src="{{ asset('theme/img/logo-3.png') }}" alt="Logo"></a>
						</div>
						<div class="fxt-transformY-50 fxt-transition-delay-2">
							<h1>Welcome To xmee</h1>
						</div>
						<div class="fxt-transformY-50 fxt-transition-delay-3">
							<p>Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit. Vesti at bulum nec odio aea the dumm ipsumm ipsum that dolocons rsus mal suada and fadolorit to the dummy consectetur elit the Lorem Ipsum genera.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12 fxt-bg-color">
                <div class="fxt-content">
                    @yield('content')				
						
				</div>
				</div>
			</div>
		</div>
	</section>
    <!-- jquery-->
    <script src="{{ asset('theme/js/jquery-3.5.0.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('theme/js/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('theme/js/main.js') }}"></script>

</body>

</html>
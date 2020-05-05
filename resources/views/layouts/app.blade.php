<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico')}}" rel="shortcut icon" />

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/0c0a76602a.js" crossorigin="anonymous"></script>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css')}}" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    @yield('css')

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
    <div id="app">
        <!-- Header section -->
        <header class="header-section clearfix">
            @if(auth()->user())
            <a href="{{ url('/home') }}" class="site-logo">
            @else
            <a href="{{ url('/') }}" class="site-logo">
            @endif
            <img src="{{asset('img/logo.png')}}" id="logomain" alt="">
            </a>
            <div class="header-right">
                @if(url()->current() == url('/'))
                <a href="#footer" class="hr-btn">Ayuda</a>
                <span>|</span>
                @endif
                <div class="user-panel">
                    @guest
                    <a href="{{ url('/login') }}" class="login">Login</a>
                    <a href="{{ url('/register') }}" class="register">Regístrate</a>
                    @else
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </header>
        <!-- Header section end -->
        @yield('content')

        <!-- Footer section -->
        <footer id="footer" class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 order-lg-1 ">
                    </div>
                    <div class="col-xl-6 col-lg-5 order-lg-1 ">
                        <img src="{{asset('img/logo.png')}}" alt="">
                        <div class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());

                            </script> Todos los derechos reservados
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 order-lg-1 ">
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer section end -->
    </div>
    <!--====== Javascripts & Jquery ======-->
    
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  
</body>
</html>

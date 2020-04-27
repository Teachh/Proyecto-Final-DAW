<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/0c0a76602a.js" crossorigin="anonymous"></script>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
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
            <a href="{{ url('/') }}" class="site-logo">
                <img src="img/logo.png" id="logomain" alt="">
            </a>
            <div class="header-right">
                <a href="#footer" class="hr-btn">Ayuda</a>
                <span>|</span>
                <div class="user-panel">
                    @guest
                    <a href="{{ url('/login') }}" class="login">Login</a>
                    <a href="{{ url('/register') }}" class="register">Regístrate</a>
                    @else
                    <!-- ESTO FALTA CAMBIAR -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!-- ESTO FALTA CAMBIAR -->
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
                        <img src="img/logo.png" alt="">
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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

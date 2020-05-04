@extends('layouts.app')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">


<link rel="stylesheet" href="{{asset('css/home/open-iconic-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/home/animate.css')}}">

<link rel="stylesheet" href="{{asset('css/home/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/home/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('css/home/magnific-popup.css')}}">

<link rel="stylesheet" href="{{asset('css/home/aos.css')}}">

<link rel="stylesheet" href="{{asset('css/home/ionicons.min.css')}}">

<link rel="stylesheet" href="{{asset('css/home/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{asset('css/home/jquery.timepicker.css')}}">


<link rel="stylesheet" href="{{asset('css/home/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/home/icomoon.css')}}">
<link rel="stylesheet" href="{{asset('css/home/style.css')}}">
<style>
    header,
    footer {
        display: none;
    }

    #colorlib-aside {
        background: #5C746A;
    }

</style>
@endsection
@section('content')
<div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <a href="{{url('/home')}}"><img src="{{asset('img/logo.png')}}" id="logomain" alt=""></a>
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="{{ Request::is('home') ? 'colorlib-active' : '' }}"><a href="{{url('/home')}}">Inicio
                </a></li>
                <li class="{{ Request::is('perfil/'.auth()->user()->id) ? 'colorlib-active' : '' }}"><a href="{{action('UserController@show', auth()->user()->id)}}">Perfil</a></li>
                <li class="{{ Request::is('dibujo') ? 'colorlib-active' : '' }}"><a href="{{action('DrawController@index')}}">Crear dibujo</a></li>
                <li class="{{ Request::is('dibujo/libre') ? 'colorlib-active' : '' }}"><a href="{{action('DrawController@freeDraw')}}">Dibujo libre</a></li>
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
            </ul>
        </nav>
    </aside> <!-- END COLORLIB-ASIDE -->
    <!-- CONTENIDO -->
    @yield('content2')
    <!-- !CONTENIDO -->
</div><!-- END COLORLIB-PAGE -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="{{asset('js/home/jquery.min.js')}}"></script>
<script src="{{asset('js/home/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/home/popper.min.js')}}"></script>
<script src="{{asset('js/home/bootstrap.min.js')}}"></script>
<script src="{{asset('js/home/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/home/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/home/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/home/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/home/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/home/aos.js')}}"></script>
<script src="{{asset('js/home/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('js/home/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('js/home/google-map.js')}}"></script>
<script src="{{asset('js/home/main.js')}}"></script>
@yield('script')
@endsection

@extends('layouts.app')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

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
        <img src="{{asset('img/logo.png')}}" id="logomain" alt="">
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="colorlib-active"><a href="index.html">Inicio</a></li>
                <li><a href="{{action('UserController@show', auth()->user()->id)}}">Perfil</a></li>
                <li><a href="travel.html">Dibujo libre</a></li>
                <li>                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
            </ul>
        </nav>
    </aside> <!-- END COLORLIB-ASIDE -->

    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-8 py-5 px-md-5">
                        <div class="row pt-md-4">
                            @foreach($draws as $draw)
                            <div class="col-md-12">
                                <div class="blog-entry ftco-animate d-md-flex">
                                    <a href="single.html" class="img img-2" style="background-image: url({{$draw->url}});"></a>
                                    <div class="text text-2 pl-md-4">
                                        <h3 class="mb-2"><a href="{{action('DrawController@show', $draw->id)}}">{{$draw->title}}</a></h3>
                                        <div class="meta-wrap">
                                            <p class="meta">
                                                @php
                                                // Contar los votos
                                                $votes = $draw->votes;
                                                $pos = 0;
                                                $neg = 0;
                                                foreach($votes as $vote){
                                                if($vote->vote == 'pos'){
                                                $pos = $pos+1;
                                                }
                                                else{
                                                $neg = $neg+1;
                                                }
                                                }
                                                @endphp
                                                <span><i class="fas fa-thumbs-up"></i> {{$pos}}</span>
                                                <span><i class="fas fa-thumbs-down"></i> {{$neg}}</span>
                                            </p>
                                        </div>
                                        <p class="mb-4"><a style="color:black" href="{{action('UserController@show', $draw->user->id)}}"><i class="fas fa-user"></i> {{$draw->user->name}}</a></p>
                                        <p><a href="{{action('DrawController@show', $draw->id)}}" class="btn btn-outline-warning">Entrar al dibujo <i class="fas fa-eye"></i></a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div><!-- END-->
						<!-- ESTILO DE PAGINATE
                        <div class="row">
                            <div class="col">
                                <div class="block-27">
                                    <ul>
                                        <li><a href="#">&lt;</a></li>
                                        <li class="active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&gt;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						-->
                    </div>
                    <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
						<!-- Buscador -->
                        <div class="sidebar-box pt-md-4">
                            <form action="#" class="search-form">
                                <div class="form-group">
                                    <button style="background: none; color: #333434; height:3rem"><span class="icon "><i class="fas fa-search"></i></span></button>
                                    <input type="text" class="form-control" placeholder="Mariposas, dragones...">
                                </div>
                            </form>
                        </div>
						<!-- !Buscador -->
						<!-- EN UN FUTURO SE PUEDE MIRAR
                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Categories</h3>
                            <ul class="categories">
                                <li><a href="#">Fashion <span>(6)</span></a></li>
                                <li><a href="#">Technology <span>(8)</span></a></li>
                                <li><a href="#">Travel <span>(2)</span></a></li>
                                <li><a href="#">Food <span>(2)</span></a></li>
                                <li><a href="#">Photography <span>(7)</span></a></li>
                            </ul>
                        </div>
						-->
						<!-- Usuarios populares -->
                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Usuarios más populares</h3>
							@php
								$cnt = 0;
							@endphp	
							@foreach($popularUsersOrd as $key => $value)
							@if($cnt != 3)
								@php
									// conseguir el usuario actual para iterar con el 
									$actualUser = App\User::where('id',$key)->first();
									$actualFollow = count(App\Follow::where('user_id', $key)->get());
									$cnt++;
								@endphp
								
								<div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{$actualUser->profile_picture}});"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{action('UserController@show', $actualUser->id)}}">{{$actualUser->name}}</a></h3>
                                    <div class="meta">
										<span><i class="fas fa-users"></i> {{$actualFollow}}</span>
                                    </div>
                                </div>
                            </div>
							@endif
							@endforeach
                        </div>
						<!-- !Usuarios populares -->
						<!-- Ordenar por lo que ponga-->
                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Ordenar por</h3>
                            <ul class="tagcloud">
                                <a href="#" class="tag-cloud-link">animals</a>
                                <a href="#" class="tag-cloud-link">human</a>
                                <a href="#" class="tag-cloud-link">people</a>
                                <a href="#" class="tag-cloud-link">cat</a>
                                <a href="#" class="tag-cloud-link">dog</a>
                                <a href="#" class="tag-cloud-link">nature</a>
                                <a href="#" class="tag-cloud-link">leaves</a>
                                <a href="#" class="tag-cloud-link">food</a>
                            </ul>
                        </div>
						<!-- !Ordenar por lo que ponga-->
						<!-- SI ME SOBRA TIEMPO ORDENAR POR TIEMPO TAMBIEN -->
                        <div class="sidebar-box ftco-animate">
						SI ME SOBRA TIEMPO ORDENAR POR TIEMPO TAMBIEN
                            <h3 class="sidebar-heading">Archives</h3>
                            <ul class="categories">
                                <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
                                <li><a href="#">September 2018 <span>(6)</span></a></li>
                                <li><a href="#">August 2018 <span>(8)</span></a></li>
                                <li><a href="#">July 2018 <span>(2)</span></a></li>
                                <li><a href="#">June 2018 <span>(7)</span></a></li>
                                <li><a href="#">May 2018 <span>(5)</span></a></li>
                            </ul>
                        </div>
						<!-- !SI ME SOBRA TIEMPO ORDENAR POR TIEMPO TAMBIEN -->
                    </div><!-- END COL -->
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
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
@endsection

@extends('layouts.logged')
@section('content2')
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
						<!-- EN UN FUTURO SE PUEDE MIRAR SI HAGO CATEGORIAS	
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
                                <a class="blog-img" style="background-image: url({{$actualUser->profile_picture}});"></a>
                                <div class="text pl-4" style="background:linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.7)), url({{$actualUser->background}});background-position: center top;background-size: contain;">
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
                                <a href="#" class="tag-cloud-link">Votos positivos</a>
                                <a href="#" class="tag-cloud-link">Votos negativos</a>
                                <a href="#" class="tag-cloud-link">Más seguidores</a>
                                <a href="#" class="tag-cloud-link">Menos seguidores</a>
                                <a href="#" class="tag-cloud-link">Más nuevo</a>
                                <a href="#" class="tag-cloud-link">Más antiguo</a>
                            </ul>
                        </div>
						<!-- !Ordenar por lo que ponga-->
						<!-- SI ME SOBRA TIEMPO ORDENAR POR TIEMPO TAMBIEN -->
                        <div class="sidebar-box ftco-animate">
						SI ME SOBRA TIEMPO ORDENAR POR TIEMPO TAMBIEN
                            <h3 class="sidebar-heading">Fechas de dibujos</h3>
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
@endsection

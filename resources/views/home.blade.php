@extends('layouts.logged')
@section('content2')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div>
            <div class="row d-flex">
                <div class="col-xl-8 py-5 px-md-5">
                    <div id="dibujos" class="row pt-md-4">
                        @include('ajax.draws');
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
                       
                        <div class="search-form">
                            <button id="searchb" style="background: none; color: #333434; height:3rem"><span class="icon "><i class="fas fa-search"></i></span></button>
                            <input id="searchi" type="text" class="form-control" placeholder="Mariposas, dragones..." name="search">
                        </div>
                    </div>
                    <!-- !Buscador -->
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
                            <a class="tag-cloud-link ordenacion" data-value="vpos">Votos positivos</a>
                            <a class="tag-cloud-link ordenacion" data-value="vneg">Votos negativos</a>
                            <a class="tag-cloud-link ordenacion" data-value="spos">Más seguidores</a>
                            <a class="tag-cloud-link ordenacion" data-value="sneg">Menos seguidores</a>
                            <a class="tag-cloud-link ordenacion" data-value="npos">Más nuevo</a>
                            <a class="tag-cloud-link ordenacion" data-value="nneg">Más antiguo</a>
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
@section('script')
<script type="text/javascript">
    // Ajax de buscador
    $("#searchi").keyup(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var search = $("input[name=search]").val();
        $.ajax({
            url: "/home",
            data: {
                search: search
            },
            success: function(data) {
                console.log(data);
                $('#dibujos').html(`${data}`);
            }
        });
    });
    // Ajax de ordenacion
     $(".ordenacion").click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var search = $("input[name=search]").val();
        var order = $(this).data("value");
        $.ajax({
            url: "/home",
            data: {
                search: search,
                order: order
            },
            success: function(data) {
                $('#dibujos').html(`${data}`);
            },
            error: function(data){
                console.log(data);
            }
        });
    });
</script>
@endsection
@endsection

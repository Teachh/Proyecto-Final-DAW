@extends('layouts.logged')
@section('content2')
<style>
    .page-link{
        color: #5C746A;
    }
    .page-item.active .page-link {
        background-color: #5C746A;   
    }
    nav{
        margin: auto;
    }
</style>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div>
            <div class="row d-flex">
                <div class="col-xl-8 py-5 px-md-5">
                    <div id="dibujos" class="row pt-md-4">
                        @include('ajax.draws')
                    </div>
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
                            <a class="tag-cloud-link ordenacion" data-value="npos">Nombre ascendiente</a>
                            <a class="tag-cloud-link ordenacion" data-value="nneg">Nombre descendiente</a>
                            <a class="tag-cloud-link ordenacion" data-value="npos">Más nuevo</a>
                            <a class="tag-cloud-link ordenacion" data-value="nneg">Más antiguo</a>
                        </ul>
                    </div>
                    <!-- ADMINS -->
                    <div class="sidebar-box ftco-animate">
                        <h3 class="sidebar-heading">Administradores</h3>
                        <p class="border-top">Si necesitas ayuda o hay algún dibujo ofensivo contacta con los siguientes administradores</p>
                        @foreach($admins as $a)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img" style="background-image: url({{$a->profile_picture}});"></a>
                                <div class="text pl-4" style="background:linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.7)), url({{$a->background}});background-position: center top;background-size: contain;">
                                    <h3 class="heading"><a href="{{action('UserController@show', $a->id)}}">{{$a->name}}</a></h3>
                                    <div class="meta">
                                        <span><i class="fas fa-envelope"></i> {{$a->email}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- !ADMINS -->
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
                //console.log(data);
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
                //console.log(data);
            }
        });
    });
    // Ajax de paginacion
     $(".page-link").click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var search = $("input[name=search]").val();
        var order = $(this).data("value");
        var page = $(this).text();
        $.ajax({
            url: "/home",
            data: {
                search: search,
                order: order,
                page: page
            },
            success: function(data) {
                $('#dibujos').html(`${data}`);
            },
            error: function(data){
                //console.log(data);
            }
        });
    });
</script>
@endsection
@endsection

@extends('layouts.logged')
@section('content2')
<style>
    .botonesMano {
        font-size: 3rem;
        color: lightgray;
    }

    .botonesManoPeque {
        font-size: 1rem;
    }

</style>
<div id="colorlib-main">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-8">
                <h1 class="mb-2">{{$draw->title}}</h1>
            </div>
            <div class="col-12 col-md-4">
                @if(auth()->user()->id == $draw->user->id)
                <a href="{{url('dibujo/'.$draw->id.'/editar')}}"><button class="btn btn-warning btn-block mt-3">Editar dibujo</button></a>
                @endif
            </div>
        </div>
        @if(strpos(url()->previous(), $draw->id.'/editar') == true)
        <div class="alert alert-success" role="alert">
            Se ha editado correctamente
        </div>
        @endif
        <div class="row">
            <div class="row shadow-lg bg-white rounded py-3">
                <div class="col-12 col-md-5">
                    <h3>Foto original</h3>
                    <img src="{{url($draw->image)}}" class="w-100" alt="Picture">
                </div>
                <div class="col-md-1 bg-primary px-4" style=" border-left: 2rem solid #5C746A;"></div>
                <div class="col-12 col-md-5">
                    <h3>Dibujo</h3>
                    <img src="{{url($draw->draw)}}" class="w-100" alt="Draw">
                </div>
            </div>
            <div class="col-12 row mt-5 ">
                <div class="col-9">
                    <a href="{{url('vote/like/'.$draw->id)}}" class="botonesMano mx-2 @if($pos)text-success @endif"><i class="fas fa-thumbs-up"></i></a>
                    <a href="{{url('vote/dislike/'.$draw->id)}}" class="botonesMano mx-2 @if($neg)text-danger @endif"><i class="fas fa-thumbs-down"></i></a>
                    <a class="text-monospace botonesMano">{{count($votes)}}</a>
                    <a class="botonesManoPeque mx-2 text-success">{{$votesPos}} <i class="fas fa-thumbs-up"></i></a>
                    <a class="botonesManoPeque mx-2 text-danger">{{$votesNeg}} <i class="fas fa-thumbs-down"></i></a>
                </div>
                <div class="col-3">
                    <div class="block-21 mb-4 d-flex bg-info">
                        @php
                        // conseguir el usuario actual para iterar con el
                        $actualUser = App\User::where('id',$draw->user->id)->first();
                        $actualFollow = count(App\Follow::where('user_id', $draw->user->id)->get());
                        @endphp
                        <a class="blog-img" style="background-image: url({{url($actualUser->profile_picture)}});"></a>
                        <div class="text pl-4" style="background:linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.7)), url({{$actualUser->background}});background-position: center top;background-size: contain;">
                            <h3 class="heading"><a href="{{action('UserController@show', $actualUser->id)}}">{{$actualUser->name}}</a></h3>
                            <div class="meta">
                                <span><i class="fas fa-users"></i> {{$actualFollow}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h4>Comentarios</h4>
                <form method="POST" action="{{ action('CommentController@store',$draw->id) }}">
                    <div class="row">
                        @csrf
                        <div class="col-9">
                            <textarea name="text" class="form-control" id="text" rows="3" placeholder="Comentario..."></textarea>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">Enviar Comentario</button>
                        </div>
                    </div>
                </form>
                @foreach($comments as $c)
                    {{$c}}
                @endforeach
            </div>

        </div>
    </div>
</div><!-- END COLORLIB-MAIN -->
@endsection

@extends('layouts.logged')
@section('content2')
<style>
    .botonesMano {
        font-size: 2rem;
        color: lightgray;
    }

    .botonesManoPeque {
        font-size: 1rem;
    }

    .botonesCom {
        font-size: 1rem;
        color: lightgray;
    }

    .comment-container {
        width: 60%;
        margin: 2rem auto;
    }

    a {
        color: #c40030;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    .v-btn {
        align-items: center;
        border-radius: 2px;
        display: inline-flex;
        height: 36px;
        flex: 0 0 auto;
        font-size: 14px;
        font-weight: 700;
        justify-content: center;
        margin: 6px 8px;
        min-width: 88px;
        outline: 0;
        text-transform: uppercase;
        text-decoration: none;
        transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1), color 1ms;
        position: relative;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 0 16px;
    }

    .v-btn:before {
        border-radius: inherit;
        color: inherit;
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        opacity: 0.12;
        transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
        width: 100%;
    }

    .v-btn:focus,
    .v-btn:hover {
        position: relative;
    }

    .v-btn:focus:before,
    .v-btn:hover:before {
        background-color: currentColor;
    }

    .v-btn__content {
        align-items: center;
        border-radius: inherit;
        color: inherit;
        display: flex;
        flex: 1 0 auto;
        justify-content: center;
        margin: 0 auto;
        position: relative;
        transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
        white-space: nowrap;
        width: inherit;
    }

    .v-btn:not(.v-btn--depressed):not(.v-btn--flat) {
        will-change: box-shadow;
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14),
            0 1px 5px 0 rgba(0, 0, 0, 0.12);
    }

    .v-btn:not(.v-btn--depressed):not(.v-btn--flat):active {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, 0.2),
            0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12);
    }

    .avatar {
        width: 50px;
        height: 50px;
        margin-left: -42px;
        border-radius: 50%;
    }

    .v-avatar {
        align-items: center;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        position: relative;
        text-align: center;
        vertical-align: middle;
    }

    .v-avatar img {
        border-radius: 50%;
        display: inline-flex;
        height: inherit;
        width: inherit;
        object-fit: cover;
    }

    .v-card {
        text-decoration: none;
    }

    .v-card> :first-child:not(.v-btn):not(.v-chip) {
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
    }

    .v-card> :last-child:not(.v-btn):not(.v-chip) {
        border-bottom-left-radius: inherit;
        border-bottom-right-radius: inherit;
    }

    .v-sheet {
        display: block;
        border-radius: 2px;
        position: relative;
    }

    .v-dialog__container {
        display: inline-block;
        vertical-align: middle;
    }

    .elevation-2 {
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14),
            0 1px 5px 0 rgba(0, 0, 0, 0.12) !important;
    }

    ::-ms-clear,
    ::-ms-reveal {
        display: none;
    }

    .headline {
        font-weight: 400;
        letter-spacing: normal !important;
        font-size: 24px !important;
        line-height: 32px !important;
    }

    .title {
        font-size: 20px !important;
        font-weight: 700;
        line-height: 1 !important;
        letter-spacing: 0.02em !important;
    }

    .caption {
        font-weight: 400;
        font-size: 12px !important;
    }

    .theme--light.v-btn {
        color: rgba(0, 0, 0, 0.87);
    }

    .theme--light.v-btn:not(.v-btn--icon):not(.v-btn--flat) {
        background-color: #f5f5f5;
    }

    .theme--light .v-card {
        box-shadow: rgba(0, 0, 0, 0.11) 0 15px 30px 0px,
            rgba(0, 0, 0, 0.08) 0 5px 15px 0 !important;
    }

    .theme--light.application .v-card {
        box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.11),
            0 5px 15px 0 rgba(0, 0, 0, 0.08) !important;
        color: #102c3c !important;
    }

    .theme--light.v-card,
    .theme--light.v-sheet {
        background-color: #fff;
        border-color: #fff;
        color: rgba(0, 0, 0, 0.87);
    }


    .wrapper {
        overflow: auto;
    }

    .comment {
        overflow-y: auto;
        margin-left: 32px;
        margin-right: 16px;
    }

    .comment p {
        font-size: 14px;
        margin-bottom: 7px;
    }

    .displayName {
        margin-left: 24px;
    }

    .actions {
        display: flex;
        flex: 1;
        flex-direction: row;
        justify-content: flex-end;
    }

    .google-span[data-v-35838f51] {
        font-size: 14px;
        color: rgba(0, 0, 0, 0.54);
    }

    .google-button[data-v-35838f51] {
        background-color: #fff;
        height: 40px;
        margin: 0;
    }

    .headline {
        margin-left: 32px;
    }

    .sign-in-wrapper {
        margin-top: 16px;
        margin-left: 32px;
    }


    .error-message {
        font-style: oblique;
        color: #c40030;
    }

    ::-moz-selection,
    ::selection {
        background-color: #b3d4fc;
        color: #000;
        text-shadow: none;
    }

    .card,
    .card {
        padding: 32px 16px;
        margin-bottom: 32px;
        display: flex;
        flex-direction: column;
    }

    .application a,
    [type="button"],
    button {
        cursor: pointer;
    }

    @media screen and (max-width: 640px) {
        .comment-container {
            width: 90%;
        }

        .comments {
            padding: 32px;
        }
    }

</style>
<div id="colorlib-main">
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-8">
                <h1 class="mb-2">{{$draw->title}}</h1>
            </div>
            <div class="col-12 col-md-4 mb-4">
                @if(auth()->user()->id == $draw->user->id || auth()->user()->rol == 'admin')
                <div class="row">
                <a href="{{url('dibujo/'.$draw->id.'/editar')}}" class="col-6"><button class="btn btn-warning btn-block mt-3 ">Editar dibujo</button></a>
                <a data-toggle="modal" data-target="#borrarModal" class="col-6"><button class="btn btn-danger btn-block mt-3">Borrar dibujo</button></a>
                <!-- Modal -->
                <div class="modal fade" id="borrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Desea borrar su dibujo?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Si su dibujo se borrar se borrará de nuestra base de datos y no se podrá recuperar!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <form action="{{action('DrawController@destroy', $draw->id)}}" method="POST" style="display:inline" >
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                </div>
                @endif
            </div>
        </div>
        @if(strpos(url()->previous(), $draw->id.'/editar') == true)
        <div class="alert alert-success" role="alert">
            Se ha editado correctamente
        </div>
        @endif
        <div class="container">
            <div class="row shadow-lg bg-white rounded py-3">
                <div class="col-12 col-md-5">
                    <h3>Foto original</h3>
                    <img src="{{url($draw->image)}}" class="w-100" alt="Picture">
                </div>
                <div class="col-md-1 bg-primary px-4" style=" border-left: 2rem solid #5C746A;"></div>
                <div class="col-12 col-md-6">
                    <h3>Dibujo</h3>
                    <img src="{{url($draw->draw)}}" class="w-100 h-75" alt="Draw">
                </div>
            </div>
            <div class="mt-4">{{$draw->description}} </div>

            <div class="col-12 row mt-5 ">
                <div class="col-md-9">
                    <div class="col-md-6">
                        <a href="{{url('vote/like/'.$draw->id)}}" class="botonesMano mx-2 @if($pos)text-success @endif"><i class="fas fa-thumbs-up"></i></a>
                        <a href="{{url('vote/dislike/'.$draw->id)}}" class="botonesMano mx-2 @if($neg)text-danger @endif"><i class="fas fa-thumbs-down"></i></a>
                        <a class="text-monospace botonesMano">{{count($votes)}}</a>
                        <a class="botonesManoPeque mx-2 text-success">{{$votesPos}} <i class="fas fa-thumbs-up"></i></a>
                        <a class="botonesManoPeque mx-2 text-danger">{{$votesNeg}} <i class="fas fa-thumbs-down"></i></a>
                    </div>
                </div>
                <div class="mt-3 mt-md-0 col-md-3">
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
                        <div class="col-12 col-md-9">
                            <textarea name="text" required class="form-control" id="text" rows="3" placeholder="Comentario..."></textarea>
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-info w-100 mt-3 mt-md-0">Enviar Comentario</button>
                        </div>
                    </div>
                </form>
                <div class="comment-container theme--light">
                    <div class="comments">
                        @foreach($comments as $c)
                        <div>
                            <div class="card v-card v-sheet theme--light elevation-2">
                                <div class="header">
                                    <div class="v-avatar avatar" style="height: 50px; width: 50px;"><img src="{{url($c->user->profile_picture)}}"></div>
                                    <span class="displayName title">{{$c->user->name}}</span> <span class="displayName caption">{{$c->user->created_at}}</span>
                                </div>
                                <div class="wrapper comment">
                                    <p>{{$c->text}}</p>
                                </div>
                                <div class="actions">
                                    <a href="{{url('comentario/like/'.$c->id)}}" class="botonesCom mx-2">{{$c->like}} <i class="fas fa-thumbs-up"></i></a>
                                    <a href="{{url('comentario/dislike/'.$c->id)}}" class="botonesCom mx-2">{{$c->dislike}} <i class="fas fa-thumbs-down"></i></a>
                                    @if(auth()->user()->id == $c->user->id || auth()->user()->rol == 'admin')
                                        <a href="{{url('comentario/'.$c->id.'/delete')}}" class="botonesCom mx-2"><i class="fas fa-eraser"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>
</div><!-- END COLORLIB-MAIN -->
@endsection

@extends('layouts.logged')

<style>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>body {
        margin-top: auto;
        background-color: #5C746A;
    }

    .border {
        border-bottom: 1px solid #F1F1F1;
        margin-bottom: 10px;
    }

    .main-secction {
        box-shadow: 10px 10px 10px;
    }

    .image-section {
        padding: 0px;
    }

    .image-section img {
        width: 100%;
        height: 25rem;
        position: relative;
    }

    .user-image {
        position: absolute;
        margin-top: -50px;
    }

    .user-left-part {
        margin: 0px;
    }

    .user-image img {
        width: 100px;
        height: 100px;
    }

    .user-profil-part {
        padding-bottom: 30px;
        background-color: #FAFAFA;
    }

    .follow {
        margin-top: 70px;
    }

    .user-detail-row {
        margin: 0px;
    }

    .user-detail-section2 p {
        font-size: 12px;
        padding: 0px;
        margin: 0px;
    }

    .user-detail-section2 {
        margin-top: 10px;
    }

    .user-detail-section2 span {
        color: #7CBBC3;
        font-size: 20px;
    }

    .user-detail-section2 small {
        font-size: 12px;
        color: #D3A86A;
    }

    .profile-right-section {
        padding: 20px 0px 10px 15px;
        background-color: #FFFFFF;
    }

    .profile-right-section-row {
        margin: 0px;
    }

    .profile-header-section1 h1 {
        font-size: 25px;
        margin: 0px;
    }

    .profile-header-section1 h5 {
        color: #0062cc;
    }

    .req-btn {
        height: 30px;
        font-size: 12px;
    }

    .profile-tag {
        padding: 10px;
        border: 1px solid #F6F6F6;
    }

    .profile-tag p {
        font-size: 12px;
        color: black;
    }

    .profile-tag i {
        color: #ADADAD;
        font-size: 20px;
    }

    .image-right-part {
        background-color: #FCFCFC;
        margin: 0px;
        padding: 5px;
    }

    .img-main-rightPart {
        background-color: #FCFCFC;
        margin-top: auto;
    }

    .image-right-detail {
        padding: 0px;
    }

    .image-right-detail p {
        font-size: 12px;
    }

    .image-right-detail a:hover {
        text-decoration: none;
    }

    .image-right img {
        width: 100%;
    }

    .image-right-detail-section2 {
        margin: 0px;
    }

    .image-right-detail-section2 p {
        color: #38ACDF;
        margin: 0px;
    }

    .image-right-detail-section2 span {
        color: #7F7F7F;
    }

    .nav-link {
        font-size: 1.2em;
    }

</style>
@section('content2')
<div id="colorlib-main">
    <div class="container main-secction ">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section p-0">
                <img src="{{asset($user->background)}}">
            </div>

            <div class="row user-left-part p-0 col-12">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="{{asset($user->profile_picture)}}" class="rounded-circle">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <form action="{{action('UserController@showDraws', $user->id)}}" style="display:inline">
                                <button class="btn btn-success btn-block follow mb-2">Ver dibujos</button>
                            </form>
                            <form action="{{action('UserController@getFollowers', $user->id)}}" style="display:inline">
                                <button type="submit" class="btn btn-warning btn-block mb-2">Ver seguidores</button>
                            </form>
                            <form action="{{action('UserController@getFollows', $user->id)}}" style="display:inline">
                                <button type="submit" class="btn btn-info btn-block">Ver seguidos</button>
                            </form>
                        </div>
                        <div class="row user-detail-row w-100">

                            <div class="pl-5 col-md-12 col-sm-12 user-detail-section2 pull-left row pt-2">
                                <div class="col-6">
                                    <p>SEGUIDORES</p>
                                    <span>{{$follow}}</span>
                                </div>
                                <div class="col-6">
                                    <p>SIGUIENDO</p>
                                    <span>{{$following}}</span>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section ">
                    <div class="row profile-right-section-row ">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left my-3">
                                    <h1>{{$user->name}}</h1>
                                </div>
                                @if($user->id != auth()->user()->id )
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth mb-3">
                                    @if(App\Follow::where('user_id',$user->id)->where('user_id_request',auth()->user()->id)->count() == 0)
                                    <a href="{{action('FollowController@create', $user->id)}}" class="btn btn-primary btn-block">Seguir</a>
                                    @else
                                    <a href="{{action('FollowController@destroy', $user->id)}}" class="btn btn-danger btn-block">Dejar de seguir</a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Perfil</a>
                                        </li>
                                        @if($user->id == auth()->user()->id || auth()->user()->rol == 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Modificar Perfil</a>
                                        </li>
                                        @endif
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content mt-2 px-2">
                                        <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{$user->email}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Biografía</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{$user->biography}}</p>
                                                </div>
                                            </div>
                                              <div class="row">
                                                <div class="col-md-4">
                                                    <label>Fecha de creación de la cuenta</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>{{$user->created_at}}</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div role="tabpanel mt-2" class="tab-pane fade" id="buzz">
                                            <form action="{{action('UserController@update', $user)}}" method="POST" style="display:inline" enctype="multipart/form-data">
                                                {{ method_field('PUT') }}
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Biografía</label>
                                                    </div>
                                                    <div class="col-md-6 mt-1">
                                                        <textarea name="biography" class="form-control">{{$user->biography}}</textarea>
                                                        <label>máximo 255 carácteres</label>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Imagen</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" name="profile_picture">
                                                        @if ($user->profile_picture)
                                                        <code>{{ $user->profile_picture }}</code>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-2">
                                                        <label>Fondo perfil</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="file" class="form-control" name="background">
                                                        @if ($user->profile_picture)
                                                        <code>{{ $user->profile_picture }}</code>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button class="btn btn-warning btn-block mt-3">Cambiar Datos</button>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

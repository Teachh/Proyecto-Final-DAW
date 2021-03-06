@extends('layouts.logged')
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway');

    body {
        background: #5c746a;
        color: #001a23;
        font-family: 'Raleway', sans-serif;
        font-size: 5vw;
    }

    .followersul {
        list-style-type: none;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        transform-origin: top left;
        transform: skewY(4.398705355deg);
        margin: 20vw 25% 0 2%;
    }

    .followersli {
        transform-origin: top left;
        transform: skewY(-4.398705355deg) rotatez(-14.03624deg);
        padding-top: 150%;
        z-index: 1;
        transition-property: z-index;
        transition-duration: .3s;
    }

    .details {
        position: absolute;
        z-index: 2;
        width: 98%;
        height: 95%;
        top: 0;
        background-color: #53b3cb;
        border-radius: 2vw;
        -webkit-filter: drop-shadow(2px 6px 3px rgba(0, 0, 0, 0.4));
        filter: drop-shadow(2px 6px 3px rgba(0, 0, 0, 0.4));
        transform: rotate(0deg) translate(0, 0);
        transition-property: transform;
        transition-duration: .3s;
    }



    .followersli:nth-child(3n+1) .details {
        background-color: #f9c22e;
    }

    .followersli:nth-child(3n+2) .details {
        background-color: #35ce8d;
    }

    .product {
        position: absolute;
        z-index: 3;
        width: 88%;
        height: 91%;
        top: 0;
        transform: translateX(6.5%) translateY(5%);
        border-radius: 1.2vw;
        background: #001a23;
        overflow: hidden;
    }

    h2,
    p,
    .cardimg {
        position: absolute;
        z-index: 4;
    }

    h2,
    p {
        background-color: #53b3cb;
        padding: 0.4em;
    }

    .followersli:nth-child(3n+1) h2,
    .followersli:nth-child(3n+1) p {
        background-color: #f9c22e;
    }

    .followersli:nth-child(3n+2) h2,
    .followersli:nth-child(3n+2) p {
        background-color: #35ce8d;
    }

    h2 {
        top: 3.5%;
        left: 4%;
    }

    p {
        bottom: 3.5%;
        right: 5%;
        font-size: 1.2em;
    }

    .cardimg {
        height: 110%;
        left: 50%;
        transform: translateX(-50%) translateY(-2%);
        transition-property: height, transform;
        transition-duration: .3s;
    }

    .followersli:hover {
        z-index: 4;
    }

    .followersli:hover .details {
        transform: rotate(14.03624deg) translate(0%, 10%);
    }

    .followersli:hover img {
        height: 210%;
        transform: translateX(-50%) translateY(-14%);
    }

    @media (min-width:300px) {
        body {
            font-size: 2.75vw;
        }

        .followersul {
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 3vw;
            margin: 10vw 14vw 0 2vw;
        }
    }

    @media (min-width:600px) {
        body {
            font-size: 1.95vw;
        }

        .followersul {
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: 2vw;
            margin: 8vw 10vw 0 1vw;
        }
    }

    @media (min-width:900px) {
        body {
            font-size: 1.5vw;
        }

        .followersul {
            grid-template-columns: repeat(4, 1fr);
            grid-column-gap: 1.5vw;
            margin: 6vw 7.5vw 0 0.5vw;
        }
    }

    @media (min-width:1200px) {
        body {
            font-size: 1.25vw;
        }

        .followersul {
            grid-template-columns: repeat(5, 1fr);
            grid-column-gap: 1vw;
            margin: 4.5vw 6vw 0 0.5vw;
        }
    }

    @media (min-width:1500px) {
        body {
            font-size: 1vw;
        }

        .followersul {
            grid-template-columns: repeat(6, 1fr);
            grid-column-gap: 1vw;
            margin: 4vw 6vw 0 0.5vw;
        }
    }

</style>
@section('content2')
<div id="colorlib-main">

<div class="m-3">
    <a class="back" href="{{url()->previous()}}"><i class="fas fa-arrow-left"></i> Volver al perfil</a>
</div>
<ul class="followersul">
@if(count($followers) == 0)
<div style="margin-bottom:25rem">
<h2>Actualmente el usuario {{$usuario->name}} no tiene seguidores</h2>
</div>
@endif
@foreach($followers as $follower)

    <li class="followersli">
    
    <a href="{{action('UserController@show', App\User::findOrFail($follower->user_id_request)->id)}}">
        <div class="details">
            <h2>{{App\User::findOrFail($follower->user_id_request)->name}}</h2>
            <div class="product">
                <img class="cardimg" src="{{asset(App\User::findOrFail($follower->user_id_request)->profile_picture)}}">
            </div>
        </div>
    </a>
    </li>
@endforeach
</ul>
</div>
@endsection

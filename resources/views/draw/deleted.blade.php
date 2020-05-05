@extends('layouts.logged')
@section('content2')
<div id="colorlib-main">
    <div class="container main-secction my-3">
        <div class="card text-center mt-5">
            <div class="card-body">
                <h5 class="card-title">El dibujo se ha borrado con éxito!</h5>
                <p class="card-text">No dudes en volver a hacer un dibujo!</p>
                <a href="{{url('home')}}" class="btn btn-primary">Volver al inicio</a>
            </div>
        </div>
    </div>
</div>

@endsection

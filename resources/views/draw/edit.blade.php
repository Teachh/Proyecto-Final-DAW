@extends('layouts.logged')
@section('content2')
<div id="colorlib-main">
    <div class="container main-secction my-3">
        <h1 class="mx-auto w-50 align-content-center">EDITANDO <span style="font-weight:bold">{{$draw->title}}</span></h1>
        <form action="{{action('DrawController@update', $draw->id)}}" method="POST" style="display:inline"  enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Nomde del dibujo</label>
                <input name="title" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre del dibujo" required value="{{$draw->title}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción del dibujo</label>
                <textarea name="description" class="form-control" id="descripcion" rows="5" placeholder="Descripción...">{{$draw->description}}</textarea>
            </div>
            <div class="form-group row">
                <div class="col-12 col-md-6">
                    <label for="exampleFormControlTextarea1">Imágen</label>
                    <input name="image" type='file' class="form-control" onchange="readURL(this,'imagen');" />
                    <img id="imagen" src="{{url($draw->image)}}"/>
                    <small id="emailHelp" class="form-text text-muted">Imágen la cual has dibujado</small>


                </div>
                <div class="col-12 col-md-6">
                    <label for="exampleFormControlTextarea1">Dibujo</label>
                    <input name="draw" type='file' class="form-control" onchange="readURL(this,'dibujo');" />
                    <img id="dibujo" src="{{url($draw->draw)}}"/>
                    <small id="emailHelp" class="form-text text-muted">Dibujo hecho</small>

                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary">Editar Dibujo</button>
        </form>
    </div>
</div>
@section('script')
<script>
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + id)
                    .attr('src', e.target.result)
                    .width('100%')
                    .height('75%');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection

@endsection

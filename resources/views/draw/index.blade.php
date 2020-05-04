@extends('layouts.logged')
@section('content2')
<div id="colorlib-main">
    <div class="container main-secction my-3">
        <h1 class="mx-auto w-50 align-content-center">CREA TU DIBUJO!</h1>
        <form method="POST" action="{{ route('drawcreate') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nomde del dibujo</label>
                <input name="title" type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre del dibujo" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción del dibujo</label>
                <textarea name="description" class="form-control" id="descripcion" rows="5" placeholder="Descripción..."></textarea>
            </div>
            <p class="mt-2">Introduce las dos imágenes, primero el dibujo/foto original y luego tu dibujo!</p>
            <div class="form-group row">
                <div class="col-12 col-md-6">
                    <label for="exampleFormControlTextarea1">Imágen</label>
                    <input name="image" type='file' class="form-control" onchange="readURL(this,'imagen');" />
                    <img id="imagen" src="{{url('img/drawForm/defaultImg.jpg')}}"/>
                    <small id="emailHelp" class="form-text text-muted">Imágen la cual has dibujado</small>


                </div>
                <div class="col-12 col-md-6">
                    <label for="exampleFormControlTextarea1">Dibujo</label>
                    <input name="draw" type='file' class="form-control" onchange="readURL(this,'dibujo');" />
                    <img id="dibujo" src="{{url('img/drawForm/defaultImg.jpg')}}"/>
                    <small id="emailHelp" class="form-text text-muted">Dibujo hecho</small>

                </div>
            </div>
            <p style="color:red;font-weight:bold">{{$messageError ?? ''}}</p>
            <button type="submit" class="btn btn-lg btn-primary">Crear Dibujo</button>
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

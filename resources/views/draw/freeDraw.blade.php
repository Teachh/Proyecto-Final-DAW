@extends('layouts.logged')
@section('content2')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="pt-md-2 row">
                <div class="container border border-warning mb-5 px-5 py-2">
                    <a id="al" style="font-weight:bold;color:red"></a>
                    <div id="options" class="row">
                        <div class="col-6 col-lg-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="color-picker"><i class="fas fa-paint-roller"></i></label>
                                </div>
                                <select class="custom-select" id="color-picker">
                                    <option value="black">Negro</option>
                                    <option value="red">Rojo</option>
                                    <option value="blue">Azúl</option>
                                    <option value="green">Verde</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="thickness-picker"><i class="fas fa-paint-brush"></i></label>
                                </div>
                                <select class="custom-select" id="thickness-picker">
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3 selected>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                    <option value=10>10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-lg-1">
                            <button id="erase" class="btn btn-outline-danger"><i class="fas fa-eraser"></i> Borrar</button>
                        </div>
                        <div class="col-4 col-lg-1">
                            <button id="undo" class="btn btn-outline-info"><i class="fas fa-undo"></i> Atrás</button>
                        </div>
                        <div class="col-4 col-lg-1">
                            <button id='saveButton' class="btn btn-outline-dark"><i class="fas fa-cloud-download-alt"></i> Descargar</button>
                        </div>
                    </div>
                    <div class="border-top border-warning my-3"></div>
                    <svg id="draw">
                    </svg>
                </div>

            </div>

        </div>
    </section>
</div>
</div>
    @section('script')
        <script src="https://cdn.rawgit.com/eligrey/canvas-toBlob.js/f1a01896135ab378aa5c0118eadd81da55e698d8/canvas-toBlob.js"></script>
        <script src="https://cdn.rawgit.com/eligrey/FileSaver.js/e9d941381475b5df8b7d7691013401e171014e89/FileSaver.min.js"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src="{{asset('js/draw/draw.js')}}"></script>
    @endsection
@endsection

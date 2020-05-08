<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <script src="https://kit.fontawesome.com/0c0a76602a.js" crossorigin="anonymous"></script>
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        body {
            background-color: #5C746A;
        }
        .back{
            color:white;
            font-size: 2rem;
        }
        ul {
            list-style-type: none;
        }
    </style>
    <a class="back p-4" href="{{url()->previous()}}"><i class="fas fa-arrow-left"></i> Volver a la pestaña anterior</a>
    <div class="mb-5" id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <a href="{{url('/home')}}" class="ml-5 mt-5"><img src="{{asset('img/logo.png')}}" id="logomain" alt=""></a>
    <script src="{{ mix('js/app.js') }}" defer></script>
 
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>File Manager</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://kit.fontawesome.com/a76dfacc76.js" crossorigin="anonymous"></script>
</head>
<body oncontextmenu="return false" class="d-flex flex-column {{ (request()->is('login')) ? 'bg-light' : ''}}">
    @yield('nav')
    <div class="container px-0 pt-2">
        @yield('content')
    </div>
    @include('component/footer')
    <script src="{{asset('js/jquery.js')}}"></script> 
    <script src="{{asset('js/popper.js')}}"></script> 
    <script src="{{asset('js/script.js')}}"></script> 
    <script src="{{asset('js/bootstrap')}}.bundle.js"></script>
</body>
</html>
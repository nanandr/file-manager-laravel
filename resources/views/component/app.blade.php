<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script> 
    <script src="{{asset('js/popper.js')}}"></script> 
    <script src="{{asset('js/bootstrap')}}.bundle.js"></script>
    <title>File Manager</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('smk1.ico') }}">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container pt-2">
        @yield('nav')
        @yield('content')
    </div>
    @include('component/footer')
</body>
</html>
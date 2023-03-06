@extends('component/app')
@inject('file', 'App\Http\Controllers\FunctionController')
@section('nav')
    @extends('component/nav')
@endsection
@section('content')
    <div class="pt-2 col-sm-12 min-vh-100 ">
        @include('component/search')
        @include('component/recent')
        <div>
            <hr>
            <div class="d-flex align-items-center">

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="{{ route('trash') }}" data-toggle="dropdown" class="text-dark d-flex align-items-center">
                            <h5 class="pr-2">Trash</h5>
                            <i class="fa-solid fa-angle-down text-dark mr-2 angle" style="font-size: 26"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('home') }}" class="dropdown-item">Your Files</a>
                            <a href="{{ route('share') }}" class="dropdown-item">Shared Files</a>
                        </div>
                    </li>
                </ul>
            </div>
            <hr>

            @include('component/trash_table')
        
        </div>            
    </div>
    <div class="btn-add-mobile rounded-circle shadow shadow-hover">
        <a style="text-decoration: none; color: white;">
            <i class="fa-solid fa-plus" style="font-size: 32"></i>
        </a>
    </div>
@endsection
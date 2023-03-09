@extends('component/app')
@inject('file', 'App\Http\Controllers\FunctionController')
@section('nav')
    @include('component/nav')
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
                        <a href="{{ route('share') }}" data-toggle="dropdown" class="text-dark d-flex align-items-center">
                            <h5 class="pr-2">Shared Files</h5>
                            <i class="fa-solid fa-angle-down text-dark mr-2 angle" style="font-size: 26"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('home') }}" class="dropdown-item">Your Files</a>
                            <a href="{{ route('trash') }}" class="dropdown-item">Trash</a>
                        </div>
                    </li>
                </ul>

                <div class="row px-3 ml-auto d-flex align-items-center">
                    @if(!request()->is('share'))
                        <button data-toggle="dropdown" type="button" class="btn-add shadow-sm shadow-hover border py-2 px-5 row ml-3 mr-0" title="Upload File or Create Folder">
                            <div class="row align-items-center">
                                <h6 class="m-0">New</h6><i class="fa-solid fa-add ml-2" style="font-size: 16"></i>
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right text-right">
                            <button data-target="#fileModal" type="button" data-toggle="modal" class="dropdown-item">
                                Upload File
                            </button>
                        </div>                        
                    @endif

                    @include('file/add')
                    @include('folder/add')

                </div>
            </div>
            <hr>
            @if(request()->is('share'))
                @include('share/table')
            @else
                @include('share/table_folder')
            @endif
        
        </div>            
    </div>
    <div class="btn-add-mobile rounded-circle shadow shadow-hover">
        <a style="text-decoration: none; color: white;">
            <i class="fa-solid fa-plus" style="font-size: 32"></i>
        </a>
    </div>
@endsection
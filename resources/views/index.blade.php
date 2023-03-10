@extends('component/app')
@inject('file', 'App\Http\Controllers\FunctionController')
@section('nav')
    @include('component/nav')
@endsection
@section('content')
    <div class="pt-2 col-sm-12 min-vh-100 ">
        @if(isset($current))
            @include('search/inFolder')
        @else
            @include('search/index')
        @endif
        @include('component/recent')
        <div>
            <hr>
            <div class="d-flex align-items-center">

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="{{ route('home') }}" data-toggle="dropdown" class="text-dark d-flex align-items-center">
                            <h5 class="pr-2">Your Files</h5>
                            <i class="fa-solid fa-angle-down text-dark mr-2 angle" style="font-size: 26"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('share') }}" class="dropdown-item">Shared Files</a>
                            <a href="{{ route('trash') }}" class="dropdown-item">Trash</a>
                        </div>
                    </li>
                </ul>

                <div class="row px-3 ml-auto d-flex align-items-center">
                    <button data-toggle="dropdown" type="button" class="btn-add shadow-sm shadow-hover border py-2 px-5 row ml-3 mr-0" title="Upload File or Create Folder">
                        <div class="row align-items-center">
                            <h6 class="m-0">New</h6><i class="fa-solid fa-add ml-2" style="font-size: 16"></i>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right text-right">
                        <button data-target="#folderModal" type="button" data-toggle="modal" class="dropdown-item">
                            Create Folder
                        </button>
                        <button data-target="#fileModal" type="button" data-toggle="modal" class="dropdown-item" onclick="reset($('#clear'))">
                            Upload File
                        </button>
                    </div>

                    @include('file/add')
                    @include('folder/add')

                </div>
            </div>
            <hr>

            @include('component/table')
        
        </div>            
    </div>
    <div class="btn-add-mobile rounded-circle shadow shadow-hover dropleft">
        <a style="text-decoration: none; color: white; padding: 0px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-plus" style="font-size: 24px"></i>
        </a>
        <div class="dropdown-menu text-center">
            <div class="d-flex">
                <button data-target="#folderModalMobile" type="button" data-toggle="modal" class="dropdown-item">
                    Create Folder
                </button>
                <button data-target="#fileModalMobile" type="button" data-toggle="modal" class="dropdown-item">
                    Upload File
                </button>
            </div>
        </div>
    </div>
@endsection
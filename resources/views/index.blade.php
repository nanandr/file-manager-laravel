@extends('component/app')
@section('nav')
    @extends('component/nav')
@endsection
@section('content')
    <div class="pt-2 col-sm-12 min-vh-100 ">
        <form class="form-group shadow-sm shadow-hover bg-light" action="#">
            {{ csrf_field() }}
            <div class="d-flex border px-2 d-flex align-items-center" style="height: 50px">
                <input class="border-0 bg-light mr-auto col-sm-11" style="outline: none;" type="text" name="keyword" id="search" placeholder="Search.." autocomplete="off">
                <button class="border-0 ml-auto">
                    <i class="fa-solid fa-close text-secondary"></i>
                </button>
                <button class="border-0 ml-auto">
                    <i class="fa-solid fa-magnifying-glass text-secondary"></i>
                </button>
            </div>
        </form>

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
                            <a href="share" class="dropdown-item">Shared Files</a>
                            <a href="trash" class="dropdown-item">Trash</a>
                        </div>
                    </li>
                </ul>

                <div class="row px-3 ml-auto d-flex align-items-center">
                    <a href="" title="View on Table">
                        <i class="fa-solid fa-bars text-secondary mr-3" style="font-size: 22"></i>
                    </a>
                    <a href="" title="View on Grid">
                        <i class="fa-solid fa-grip text-secondary" style="font-size: 26"></i>
                    </a>

                    <button data-toggle="dropdown" type="button" class="btn-add shadow-sm shadow-hover border py-2 px-5 row ml-3 mr-0" title="Upload File or Create Folder">
                        <div class="row align-items-center">
                            <h6 class="m-0">New</h6><i class="fa-solid fa-add ml-2" style="font-size: 16"></i>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right text-right">
                        <button data-target="#folderModal" type="button" data-toggle="modal" class="dropdown-item pl-5">
                            Create Folder
                        </button>
                        <button data-target="#fileModal" type="button" data-toggle="modal" class="dropdown-item pl-5">
                            Upload File
                        </button>
                    </div>

                    @include('component/form')
                </div>

            </div>
            <hr>
            <div class="table-responsive mb-5 shadow">
                <table class="table table-bordered-x table-hover" style="min-width: 620px">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Last Modified</th>
                            <th>Type</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($parent))
                            <tr>
                                <td colspan="4">
                                    <a href="{{ url('folder/' . $parent->route) }}"><i class="fa-solid fa-ellipsis" style="font-size: 24"></i></a>
                                </td>
                            </tr>
                        @elseif(!isset($parent) && !request()->is('home'))
                            <tr>
                                <td colspan="4">
                                    <a href="{{ url('home') }}" class="fa-solid fa-ellipsis" style="font-size: 24"></i></a>
                                </td>
                            </tr>
                        @endif

                        {{-- foreach folder --}}
                        @foreach ($folders as $r)
                            <tr>
                                <td>
                                    <a href="{{ url('folder/' . $r->route) }}" class="text-dark">
                                        <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                        <strong>{{ $r->name }}</strong>
                                    </a>
                                </td>
                                <td>{{ $r->updated_at }}</td>
                                <td>Folder</td>
                                <td></td>
                            </tr>                            
                        @endforeach

                        {{-- foreach file --}}
                        @foreach ($files as $r)
                            <tr>
                                <td>
                                    <a href="file/" class="text-dark">
                                        <img src="{{ asset('img/icon_doc.png') }}" width="30" height="30" class="mb-1 mr-1">
                                        <strong>My Document.docx</strong>
                                    </a>
                                </td>
                                <td>20 Februari 2023</td>
                                <td>Word Document</td>
                                <td>2.1 MB</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>            
    </div>
    <div class="btn-add-mobile rounded-circle shadow shadow-hover">
        <a style="text-decoration: none; color: white;">
            <i class="fa-solid fa-plus" style="font-size: 32"></i>
        </a>
    </div>
@endsection
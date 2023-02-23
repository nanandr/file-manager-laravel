@extends('component/app')
@section('nav')
    @extends('component/nav')
@endsection
@section('content')
    <div class="pt-2 col-sm-12">
        <form class="form-group shadow-sm shadow-hover bg-light" action="#">
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
                        <a href="#" data-toggle="dropdown" class="text-dark d-flex align-items-center">
                            <h5 class="pr-2">Your Files</h5>
                            <i class="fa-solid fa-angle-down text-dark mr-2 angle" style="font-size: 26"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item {{ (request()->is('buku')) ? 'active' : ''}}">Shared Files</a>
                            <a href="#" class="dropdown-item {{ (request()->is('siswa')) ? 'active' : ''}}">Trash</a>
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

                    <button type="button" class="btn-add shadow-sm shadow-hover border py-2 px-5 row ml-3 mr-0" title="Upload File or Create Folder">
                        <div class="row align-items-center">
                            <h6 class="m-0">New</h6><i class="fa-solid fa-add ml-2" style="font-size: 16"></i>
                        </div>
                    </button>
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
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                        <tr>
                            <td class="">
                                <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                                <strong>Modul Laravel.docx</strong>
                            </td>
                            <td>20 Februari 2023</td>
                            <td>Word Document</td>
                            <td>2.1 MB</td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>            
    </div>
    <div class="btn-add-mobile rounded-circle shadow shadow-hover
     {{-- d-flex justify-content-center align-items-center --}}
     ">
        <a href="" style="text-decoration: none; color: white;">
            <i class="fa-solid fa-plus" style="font-size: 32"></i>
        </a>
    </div>
@endsection
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

        <div class="mb-2">
            <hr>
            <div class="d-flex align-items-center">
                <h5>Recent Files</h5>
                <a href="" title="View on Table" class="ml-auto">
                    <i class="fa-solid fa-angle-down text-dark mr-2" style="font-size: 26"></i>
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <div class="row d-flex flex-row px-2 card-inline pt-1 mb-2">
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_doc.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_pdf.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Buku IPA XI.pdf</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_exc.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_ppt.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm shadow-hover mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">10.docx</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <hr>
            <div class="d-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="text-dark d-flex align-items-center">
                            <h5 class="pr-2">Your Files</h5>
                            <i class="fa-solid fa-angle-down text-dark mr-2" style="font-size: 26"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item {{ (request()->is('buku')) ? 'active' : ''}}">Shared Files</a>
                            <a href="#" class="dropdown-item {{ (request()->is('siswa')) ? 'active' : ''}}">Trash</a>
                        </div>
                    </li>
                </ul>

                <div class="row px-3 ml-auto">
                    <a href="" title="View on Table">
                        <i class="fa-solid fa-bars text-secondary mr-2" style="font-size: 26"></i>
                    </a>
                    <a href="" title="View on Grid">
                        <i class="fa-solid fa-grip text-secondary ml-2" style="font-size: 26"></i>
                    </a>
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
    <div class="btn-upload rounded-circle d-flex justify-content-center align-items-center shadow shadow-hover">
        <a href="" style="text-decoration: none; color: white;">
            <i class="fa-solid fa-plus" style="font-size: 32"></i>
        </a>
    </div>
@endsection
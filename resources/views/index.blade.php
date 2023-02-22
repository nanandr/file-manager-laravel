@extends('component/app')
@section('nav')
    @extends('component/nav')
@endsection
@section('content')
    <div class="pt-2 col-sm-12">
        <form class="form-group shadow-sm bg-light" action="#">
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
            <h5>Recent Files</h5>
            <hr>
            <div class="table-responsive">
                <div class="row d-flex flex-row px-2 card-inline pb-2">
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_doc.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_pdf.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_exc.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('img/icon_ppt.png') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
                        <a href="#" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" class="col-sm-12 bg-light">
                            <h6 class="px-2 pt-1">Modul Laravel.docx</h6>
                        </a>
                    </div>
                    <div class="card shadow-sm mx-2" style="width: 140px; padding: 0px">
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
            <div class="d-flex">
                <h5>Your Files</h5>
                <div class="row px-3 ml-auto align-items-center">
                    <img src="{{ asset('img/icon_menu.png') }}" width="30" height="30" class="d-inline-block align-top">
                    <img src="{{ asset('img/icon_menu.png') }}" width="30" height="30" class="d-inline-block align-top">
                </div>
            </div>
            <hr>
            <div class="table-responsive mb-5 shadow">
                <table class="table table-bordered-x table-hover" style="min-width: 620px">
                    <thead>
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
@endsection
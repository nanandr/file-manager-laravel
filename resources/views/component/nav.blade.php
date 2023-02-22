<div class="sticky-top border-bottom shadow-sm bg-white">
    <nav class="navbar navbar-expand-lg nav-pills p-2 container">
        <div class="row d-flex align-items-center">
            <a href="{{ route('home') }}" class=" d-flex align-items-center nav nav-link text-dark">
                <img src="{{ asset('favicon.ico') }}" width="40" height="40" class="mr-2">
                <h2 class="mt-2">File Manager</h2>
            </a>
            {{-- <ul class="nav">
                <li class="nav-item dropdown">
                    <a href="" class="nav nav-link border border-secondary bg-white text-dark px-5" data-toggle="dropdown">New</a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item d-flex align-items-center pr-5 py-2">
                            <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="d-inline-block align-top mr-2">
                            Upload File
                        </a>
                        <a href="" class="dropdown-item d-flex align-items-center pr-5 py-2">
                            <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="d-inline-block align-top mr-2">
                            Create Folder
                        </a>
                        <a href="{{ route('petugas') }}" class="dropdown-item {{ (request()->is('petugas')) ? 'active' : ''}}">Petugas</a>
                    </div>
                </li>
            </ul> --}}
        </div>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <a><i class="fa-solid fa-bars text-secondary mt-1" alt="menu" style="font-size: 26"></i></a>
        </button>
        
        <div class="collapse navbar-collapse py-2 pr-1" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="d-flex align-items-center text-dark justify-content-end" style="cursor: pointer;" data-toggle="dropdown">
                        Nandana Rafi Ardika
                        <img src="{{ asset('favicon.ico') }}" width="38" height="38" class="rounded-circle d-inline-block align-top ml-1 border">
                    </a>
                    {{-- <a href="" class="btn text-primary dropdown-toggle mr-2 col-sm-12" data-toggle="dropdown">{{Auth::user()->namapetugas}}</a> --}}
                    <div class="dropdown-menu text-right">
                        <button data-target="#" type="button" data-toggle="modal" class="dropdown-item pl-5">
                            Edit Profile
                        </button>
                        <a href="{{ route('logout') }}" class="dropdown-item pl-5" onclick="return confirm('Apakah anda yakin akan logout?')">
                            Logout
                        </a>
                        {{-- <button data-target="#editPetugas{{ Auth::user()->idpetugas }}" type="button" data-toggle="modal" class="dropdown-item">Edit Profile</button> --}}
                        {{-- <a href="{{ route('logout') }}" class="dropdown-item" onclick="return confirm('Apakah anda yakin akan logout?')">Logout</a> --}}
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
{{-- @include('petugas/edit') --}}
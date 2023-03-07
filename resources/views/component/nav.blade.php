<div class="sticky-top border-bottom shadow-sm bg-white">
    <nav class="navbar navbar-expand nav-pills p-2 container">
        <div class="row d-flex align-items-center">
            <a href="{{ route('home') }}" class=" d-flex align-items-center nav nav-link text-dark">
                <img src="{{ asset('favicon.ico') }}" width="40" height="40" class="mr-2">
                <h2 class="mt-2">File Manager</h2>
            </a>
        </div>
        
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="d-flex align-items-center text-dark justify-content-end" style="cursor: pointer;" data-toggle="dropdown">
                    <p class="m-0 nav-profile">{{ Auth::user()->full_name }}</p>
                    <img src="{{ asset('profiles/'.Auth::user()->icon_route) }}" width="38" height="38" class="img-cover rounded-circle d-inline-block align-top ml-1 border">
                </a>
                <div class="dropdown-menu dropdown-menu-right text-right">
                    <button data-target="#editProfile" type="button" data-toggle="modal" class="dropdown-item pl-5">
                        Edit Profile
                    </button>
                    <a href="{{ route('logout') }}" class="dropdown-item pl-5" onclick="return confirm('Apakah anda yakin akan logout?')">
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</div>
@include('profile/edit')
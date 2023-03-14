<form class="form-group shadow-sm shadow-hover bg-light" action="{{ url('share/'.$current->route.'search') }}" method="GET">
    <div class="d-flex border px-2 d-flex align-items-center" style="height: 50px">
        <input value="{{ request('keyword') }}" id="search" class="border-0 bg-light mr-auto col-sm-11" style="outline: none;" type="text" name="keyword" id="search" placeholder="Search.." autocomplete="off">
        @if(request('keyword') !== null)
            <a href="{{url('share/folder/'.$current->route)}}" class="border-0 ml-auto text-dark" style="cursor:pointer" onclick="closeButton()">
                <i class="fa-solid fa-close text-secondary"></i>
            </a>        
        @else
            <button type="reset" id="close" class="border-0 ml-auto text-dark" style="cursor:pointer" onclick="closeButton()">
                <i class="fa-solid fa-close text-secondary"></i>
            </button>    
        @endif
        <button class="border-0 ml-auto">
            <i class="fa-solid fa-magnifying-glass text-secondary"></i>
        </button>
    </div>
</form>
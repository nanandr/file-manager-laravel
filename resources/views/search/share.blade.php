<form class="form-group shadow-sm shadow-hover bg-light" action="{{ url('search/share') }}" method="GET">
    {{ csrf_field() }}
    <div class="d-flex border px-2 d-flex align-items-center" style="height: 50px">
        <input value="{{ request('keyword') }}" id="search" class="border-0 bg-light mr-auto col-sm-11" style="outline: none;" type="text" name="keyword" id="search" placeholder="Search.." autocomplete="off">
        <a @if(!request()->is('share')) href="{{url('share')}}" @endif class="border-0 ml-auto text-dark" @if(request()->is('share') || isset($parent)) id="close" @endif style="cursor:pointer" onclick="closeButton()">
            <i class="fa-solid fa-close text-secondary"></i>
        </a>
        <button class="border-0 ml-auto">
            <i class="fa-solid fa-magnifying-glass text-secondary"></i>
        </button>
    </div>
</form>
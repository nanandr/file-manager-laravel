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
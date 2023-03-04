@if(isset($parent))
    <a href="{{ url('folder/' . $parent->route) }}"><i class="fa-solid fa-ellipsis pb-2" style="font-size: 24"></i></a>
@elseif(!isset($parent) && !request()->is('home'))
    <a href="{{ url('home') }}" class="fa-solid fa-ellipsis pb-2" style="font-size: 24"></i></a>
@endif

<div class="d-flex flex-row flex-wrap">
    @foreach ($folders as $r)
        <div class="card card-inline mx-2 my-2 shadow-sm shadow-hover">
            <a href="{{ url('folder/' . $r->route) }}" class="text-dark d-flex flex-column" style="padding: 0px">
                <img src="{{ asset('favicon.ico') }}" class="bg-light card-img px-5 py-4">
                <h6 class="pt-2 px-2">
                    {{ substr($r->name, 0, 12) }}
                    @if (strlen($r->name) > 12)
                        ...
                    @endif
                </h6>
            </a>
        </div>
    @endforeach
    @foreach ($files as $r)
        <div class="card card-inline mx-2 my-2 shadow-sm shadow-hover">
            <a href="{{ url('file/' . $r->route) }}" class="text-dark d-flex flex-column" style="padding: 0px">
                <img src="{{ asset('uploads/' . $r->route) }}" class="bg-light card-img px-5 py-4">
                <h6 class="pt-2 px-2">
                    {{ substr($r->name, 0, 12) }}
                    @if (strlen($r->name) > 12)
                        ...
                    @endif
                </h6>
            </a>
        </div>
    @endforeach
</div>
<div class="mb-2">
    <hr>
    <div class="d-flex align-items-center">
        <button type="button" data-toggle="collapse" data-target="#collapseRecent" aria-expanded="false" aria-controls="collapseRecent" class="nav-link text-dark d-flex align-items-center" style="padding: 0; background: white; border: 0">
            <h5 class="pr-2">Recent Files</h5>
            <i class="fa-solid fa-angle-down text-dark mr-2 angle" style="font-size: 26"></i>
        </a>
    </div>
    <div class="inline-group px-3 collapse" id="collapseRecent">
        <div class="row pt-2 pb-3">
            @foreach($recent as $r)
                <div class="card card-inline mx-2 shadow-sm shadow-hover">
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
    </div>
</div>
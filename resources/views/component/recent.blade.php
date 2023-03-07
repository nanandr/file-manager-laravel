<div class="mb-2">
    <hr>
    <div class="d-flex align-items-center">
        <button type="button" data-toggle="collapse" data-target="#collapseRecent" aria-expanded="false" aria-controls="collapseRecent" class="nav-link text-dark d-flex align-items-center" style="padding: 0; background: white; border: 0">
            <h5 class="pr-2">Recent Files</h5>
            <i class="fa-solid fa-angle-down text-dark mr-2 angle" style="font-size: 26"></i>
        </a>
    </div>
    <div class="inline-group px-3 collapse" id="collapseRecent">
        @if($recent->count() > 0)
            <div class="row pt-2 pb-3">
                @foreach($recent as $r)
                    <div class="card card-inline mx-2 shadow-sm shadow-hover">
                        @if($file->getType($r->type) == 'image')
                            <a data-target="#recentView{{ $r->id_file }}" type="button" data-toggle="modal" class="text-dark d-flex flex-column" style="padding: 0px" title="{{ $r->name }}">
                        @else
                            <a href="{{ asset('download/' . $r->route) }}" class="text-dark d-flex flex-column" style="padding: 0px" title="{{ $r->name }}" target="_blank" download="{{ $r->name }}">
                        @endif
                            <img src="{{ asset($file::getIcon($r->route, $r->type)) }}" class="{{ $file->getCard($r->type) }}">
                        </a>
                        <div class="d-flex align-items-center">
                            <h6 class="pt-2 px-2">
                                {{ substr($r->name, 0, 12) }}
                                @if (strlen($r->name) > 12)
                                    ...
                                @endif
                            </h6>
                            <div class="dropdown ml-auto">
                                <a class="d-flex align-items-center text-dark justify-content-end" style="cursor: pointer;" data-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical pr-3" style="font-size: 20"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right text-right absolute">
                                    <a href="{{ asset('download/' . $r->route) }}" class="dropdown-item" target="_blank" download="{{ $r->name }}">
                                        Download
                                    </a>
                                    <div class="dropdown-divider">
                                    </div>
                                        @if(isset($r->folder))
                                        <a href="{{ url('folder/'.$r->folder->route) }}" class="dropdown-item text-dark">
                                        @else
                                        <a href="{{ url('home') }}" class="dropdown-item text-dark">
                                        @endif
                                            Open File Location
                                        </a>
                                        <a class="dropdown-item"
                                            @if($r->hide == "false")
                                            href="{{url('hide/' . $r->route)}}">Hide
                                            @elseif($r->hide == "true")
                                            href="{{url('unhide/' . $r->route)}}">Unhide
                                            @endif
                                            From Recent
                                        </a>
                                </div>    
                            </div>
                        </div>
                    </div>
                    @include('recent/view')  
                @endforeach
            </div>
        @else
            <div class="col-sm-12 py-2 text-secondary d-flex justify-content-center align-items-center">
                <img src="{{ asset('favicon.ico') }}" style="width: 48px; filter: grayscale(100)">
                Nothing to show
            </div>
        @endif        
    </div>
</div>
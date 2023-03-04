<div class="table-responsive mb-5 shadow rounded border">
    <table class="table table-bordered-x table-hover" style="min-width: 620px">
        <thead class="bg-light">
            <tr>
                <th class="col-sm-5">Name</th>
                <th class="col-sm-3">Last Modified</th>
                <th class="col-sm-2">Type</th>
                <th class="col-sm-2">Size</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($parent))
                <tr>
                    <td colspan="4">
                        <a href="{{ url('folder/' . $parent->route) }}" class="d-flex align-items-center"><i class="fa-solid fa-ellipsis" style="font-size: 24"></i>&ensp;/&ensp;{{ $current->name }}</a>
                    </td>
                </tr>
            @elseif(!isset($parent) && !request()->is('home'))
                <tr>
                    <td colspan="4">
                        <a href="{{ url('home') }}" class="d-flex align-items-center"><i class="fa-solid fa-ellipsis" style="font-size: 24"></i>&ensp;/&ensp;{{ $current->name }}</a>
                    </td>
                </tr>
            @endif

            {{-- foreach folder --}}
            @foreach ($folders as $r)
                <tr>
                    <td>
                        <a href="{{ url('folder/' . $r->route) }}" class="text-dark">
                            <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                            <strong>
                                {{ substr($r->name, 0, 40) }}
                                @if (strlen($r->name) > 40)
                                    ...
                                @endif
                            </strong>
                        </a>
                    </td>
                    <td>{{  date('H:i:s, M d Y', strtotime($r->updated_at)) }}</td>
                    <td>Folder</td>
                    <td class="d-flex">
                        
                        <div class="dropdown ml-auto">
                            <a class="d-flex align-items-center text-dark justify-content-end" style="cursor: pointer;" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical px-2" style="font-size: 24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right text-right">
                                <button data-target="#" type="button" data-toggle="modal" class="dropdown-item">
                                    Share
                                </button>
                                <div class="dropdown-divider"></div>
                                <button data-target="#" type="button" data-toggle="modal" class="dropdown-item">
                                    Description
                                </button>
                                <button data-target="#" type="button" data-toggle="modal" class="dropdown-item">
                                    Rename
                                </button>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                    Delete
                                </a>
                            </div>    
                        </div>
                    </td>
                </tr>                            
            @endforeach

            {{-- foreach file --}}
            @foreach ($files as $r)
                <tr>
                    <td>
                        <a href="{{ url('file/' . $r->route) }}" class="text-dark">
                            <img src="{{ asset('uploads/' . $r->route) }}" width="30" height="30" class="mb-1 mr-1 img-cover">
                            <strong>
                                {{ substr($r->name, 0, 40) }}
                                @if (strlen($r->name) > 40)
                                    ...
                                @endif
                            </strong>
                        </a>
                    </td>
                    <td>{{  date('H:i:s, M d Y', strtotime($r->updated_at)) }}</td>
                    <td>{{ $r->type }}</td>
                    <td class="d-flex">
                        {{ $r->size }}
                        <div class="dropdown ml-auto">
                            <a class="d-flex align-items-center text-dark justify-content-end" style="cursor: pointer;" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical px-2" style="font-size: 24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right text-right">
                                <a href="{{ asset('download/' . $r->route) }}" class="dropdown-item" target="_blank" download="{{ $r->name }}">
                                    Download
                                </a>
                                <button data-target="#" type="button" data-toggle="modal" class="dropdown-item">
                                    Share
                                </button>
                                <div class="dropdown-divider"></div>
                                <button data-target="#" type="button" data-toggle="modal" class="dropdown-item">
                                    Description
                                </button>
                                <button data-target="#" type="button" data-toggle="modal" class="dropdown-item">
                                    Rename
                                </button>
                                <a href="" class="dropdown-item">
                                    Hide From Recent
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                    Delete
                                </a>
                            </div>    
                        </div>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>    
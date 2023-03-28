<div class="table-responsive mb-5 shadow rounded border" style="min-height: 500px">
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
                    <td colspan="4" class="d-flex bg-white">
                        <a href="{{ url('share/folder/' . $parent->route) }}" class="d-flex align-items-center"><i class="fa-solid fa-ellipsis" style="font-size: 24"></i></a>&ensp;/&ensp;{{ $current->name }}
                    </td>
                </tr>
            @elseif(!isset($parent) && !request()->is('share') && !request()->is('search/share'))
                <tr>
                    <td colspan="4" class="d-flex bg-white">
                        <a href="{{ url('share') }}" class="d-flex align-items-center"><i class="fa-solid fa-ellipsis" style="font-size: 24"></i></a>&ensp;/&ensp;{{ $current->name }}
                    </td>
                </tr>
            @endif

            {{-- foreach folder --}}
            @foreach ($folders as $r)
                <tr>
                    <td>
                        <a href="{{ url('share/folder/' . $r->route) }}" class="text-dark" title="{{ $r->name }}">
                            <img src="{{ asset('favicon.ico') }}" width="30" height="30" class="mb-1 mr-1">
                            <strong>
                                {{ substr($r->name, 0, 30) }}
                                @if (strlen($r->name) > 30)
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
                                <button data-target="#folderDesc{{ $r->id_folder }}" type="button" data-toggle="modal" class="dropdown-item">
                                    Description
                                </button>
                                @if($r->access == 'edit')
                                    <button data-target="#folderEdit{{ $r->id_folder }}" type="button" data-toggle="modal" class="dropdown-item">
                                        Rename
                                    </button>
                                    <a href="{{ url('trash/folder/' . $r->route) }}" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </a>
                                @endif
                            </div>    
                        </div>
                    </td>
                </tr>
                @include('folder/desc')       
                @include('folder/edit')                     
            @endforeach

            {{-- foreach file --}}
            @foreach ($files as $r)
                <tr>
                    <td>
                        @if($file->getType($r->type) == 'image')
                            <a data-target="#fileView{{ $r->id_file }}" type="button" data-toggle="modal" class="text-dark" title="{{ $r->name }}">
                                {{-- icon goes here --}}
                        @elseif($file->getType($r->type) == 'video')
                            <a data-target="#videoView{{ $r->id_file }}" type="button" data-toggle="modal" class="text-dark" title="{{ $r->name }}">
                        @elseif($file->getType($r->type) == 'audio')
                            <a data-target="#audioView{{ $r->id_file }}" type="button" data-toggle="modal" class="text-dark" title="{{ $r->name }}">
                        @else
                            <a href="{{ asset('download/' . $r->route) }}" class="text-dark" title="{{ $r->name }}" target="_blank" download="{{ $r->name }}">
                        @endif

                            <img src="{{ asset($file->getIcon($r->route, $r->type)) }}" width="30" height="30" class="mb-1 mr-1 img-cover">
                        
                            <strong>
                                {{ substr($r->name, 0, 30) }}
                                @if (strlen($r->name) > 30)
                                    ...
                                @endif
                            </strong>
                        </a>
                    </td>
                    <td>{{  date('H:i:s, M d Y', strtotime($r->updated_at)) }}</td>
                    <td>{{ strtoupper($r->type) }}</td>
                    <td class="d-flex">
                        {{ $file->formatBytes($r->size) }}
                        <div class="dropdown ml-auto">
                            <a class="d-flex align-items-center text-dark justify-content-end" style="cursor: pointer;" data-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical px-2" style="font-size: 24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right text-right absolute">
                                <a href="{{ asset('download/' . $r->route) }}" class="dropdown-item" target="_blank" download="{{ $r->name }}">
                                    Download
                                </a>
                                <button data-target="#fileDesc{{ $r->id_file }}" type="button" data-toggle="modal" class="dropdown-item">
                                    Description
                                </button>
                                @if($r->access == 'edit' || $r->id_user == Auth::user()->id_user )
                                    <div class="dropdown-divider"></div>
                                    <button data-target="#fileEdit{{ $r->id_file }}" type="button" data-toggle="modal" class="dropdown-item">
                                        Rename
                                    </button>
                                    <a href="{{ url('trash/file/' . $r->route) }}" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </a>
                                @endif
                            </div>    
                        </div>
                    </td>
                </tr> 
                @include('file/edit')   
                @include('file/view')   
                @include('file/share')   
                @include('file/desc')   
            @endforeach
        </tbody>
    </table>
</div>    
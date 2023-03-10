<div class="modal fade" id="folderShare{{ $r->id_folder }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Share Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3">
          <form action="{{ url('share/folder/'. $r->route) }}" method="post" class="form form-inline col-sm-12" autocomplete="off">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="input-group input-group col-sm-12">
                  <input name="username" type="text" class="form-control mr-2" placeholder="Username.." required>
                  <select name="access" class="form-control col-md-3 form-select mr-2">
                    <option selected disabled>Access</option>
                    <option value="view">View</option>
                    <option value="edit">Edit</option>
                  </select>
                  <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Share</button>
                  </span>
              </div>
          </form>
        </div>
        @if($r->sharedFolder->count() > 0)
          <div class="modal-body p-3">
            <h5>Shared To..</h5>
            @foreach ($r->sharedfolder as $t)
              <div class="d-flex align-items-center py-1">
                {{ $t->user->username }}
                <ul class="navbar-nav ml-auto px-0">
                  <li class="nav-item dropdown">
                    <a class="text-dark form-control text-right shadow-hover" style="cursor: pointer; width: 96px" data-toggle="dropdown">
                      {{ ucfirst($t->access) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right text-right">
                      @if($t->access == 'view')
                        <a href="{{ url('edit/folder/share/'.$t->folder->route.'/'.$t->id_user.'/edit') }}" class="dropdown-item">
                          Edit
                        </a>                            
                      @else
                      <a href="{{ url('edit/folder/share/'.$t->folder->route.'/'.$t->id_user.'/view') }}" class="dropdown-item">
                          View
                        </a>
                      @endif
                      <div class="dropdown-divider"></div>
                      <a href="{{ url('delete/folder/share/'.$t->folder->route.'/'.$t->id_user) }}" class="dropdown-item text-danger">
                        Remove Access
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            @endforeach
          </div>              
        @endif
    </div>
  </div>
</div>
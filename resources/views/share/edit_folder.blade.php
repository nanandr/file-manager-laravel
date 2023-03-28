<div class="modal fade" id="folderEdit{{ $r->folder->id_folder }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Rename Folder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 pb-3">
            <form action="{{ url('rename/folder/'. $r->folder->route) }}" method="post" class="form form-inline col-sm-12">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="input-group input-group col-sm-12">
                    <input value="{{ $r->folder->name }}" name="name" type="text" class="form-control mr-2" placeholder="Folder Name.." required>
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Rename</button>
                    </span>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
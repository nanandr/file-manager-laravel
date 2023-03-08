<div class="modal fade" id="folderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Folder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 py-3">
          @if(isset($current))
            <form action="{{ url('create/folder/'. $current->route) }}" method="post" class="form form-inline col-sm-12">
              {{ method_field('PUT') }}
          @elseif(request()->is('home'))
            <form action="create/folder" method="post" class="form form-inline col-sm-12">
          {{-- other action for uploading shared files --}}
          @endif
              {{ csrf_field() }}
              <div class="input-group input-group col-sm-12">
                <input name="name" type="text" class="form-control mr-2" placeholder="Folder Name.." required>
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Create</button>
                  </span>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
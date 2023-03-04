<div class="modal fade" id="folderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($current))
          <form action="{{ url('create/folder/'. $current->route) }} " method="post" class="form form-inline col-sm-12">
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

<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($current))
          <form action="{{ url('create/file/'. $current->route) }} " method="post" class="form form-inline col-sm-12" enctype="multipart/form-data">
            {{ method_field('PUT') }}
        @elseif(request()->is('home'))
          <form action="create/file" method="post" class="form form-inline col-sm-12" enctype="multipart/form-data">
        {{-- other action for uploading shared files --}}
        @endif
            {{ csrf_field() }}
            <div class="input-group input-group col-sm-12 d-flex justify-content-center align-items-center">
              <input type="file" name="file">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">Upload</button>
                </span>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
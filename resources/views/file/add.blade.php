<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="file.val(null)">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3">
        @if(isset($current))
          <form action="{{ url('create/file/'. $current->route) }}" method="post" class="form form-inline col-sm-12" enctype="multipart/form-data" id="upload-file">
            {{ method_field('PUT') }}
        @elseif(request()->is('home'))
          <form action="create/file" method="post" class="form form-inline col-sm-12" enctype="multipart/form-data" id="upload-file">
        {{-- other action for uploading shared files --}}
        @endif
            {{ csrf_field() }}
            {{-- <label id="clear" for="file" class="col-sm-12 p-0 mb-2 d-inline-block align-top" style="cursor: pointer">
              <img id="preview-file-before-upload" src="{{ asset('img/icon_form.png') }}" class="col-sm-12">
            </label> --}}
            <div class="col-sm-12 d-flex justify-content-between align-items-center">
              <input type="file" name="file" id="file">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Upload</button>
              </span>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fileModalMobile" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="file.val(null)">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3">
        @if(isset($current))
          <form action="{{ url('create/file/'. $current->route) }}" method="post" class="form form-inline col-sm-12" enctype="multipart/form-data" id="upload-file">
            {{ method_field('PUT') }}
        @elseif(request()->is('home'))
          <form action="create/file" method="post" class="form form-inline col-sm-12" enctype="multipart/form-data" id="upload-file">
        {{-- other action for uploading shared files --}}
        @endif
            {{ csrf_field() }}
            {{-- <label id="clear" for="file" class="col-sm-12 p-0 mb-2 d-inline-block align-top" style="cursor: pointer">
              <img id="preview-file-before-upload" src="{{ asset('img/icon_form.png') }}" class="col-sm-12">
            </label> --}}
            <div class="col-sm-12 d-flex justify-content-between align-items-center">
              <input type="file" name="file" id="file">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Upload</button>
              </span>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
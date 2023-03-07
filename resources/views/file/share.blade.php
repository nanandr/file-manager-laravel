<div class="modal fade" id="fileShare{{ $r->id_file }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Share File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 pb-3">
            <form action="{{ url('share/file/'. $r->route) }} " method="post" class="form form-inline col-sm-12">
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
      </div>
    </div>
  </div>
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Edit Profile
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="image.val(null)">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 py-3 px-3">
          <form method="post" action="{{ url('edit/user/'. Auth::user()->id_user) }}" id="upload-image" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="d-block text-center mb-2">
              <div>
                  <img id="preview-image-before-upload" src="{{ asset('profiles/'.Auth::user()->icon_route) }}" width="240" height="240" class="img-cover mb-2 rounded-circle d-inline-block align-top ml-1 border">
              </div>
            </div>

            
            <div class="form-group">
              <input type="file" name="icon_route" id="image" accept="image/*">
              @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Full Name</label>
              <input value="{{ Auth::user()->full_name }}" type="text" name="full_name" class="form-control" placeholder="Full Name.." required>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input value="{{ Auth::user()->username }}" type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
              <label>Email</label>
              <input value="{{ Auth::user()->email }}" type="email" name="email" class="form-control" placeholder="Email.." required>
            </div>

            <div class="form-group">
              <label>Change Password</label>
              <input type="password" name="oldpassword" class="form-control mb-2" placeholder="Old Password..">
              <input type="password" name="newpassword" class="form-control" placeholder="New Password..">
            </div>
            <input type="submit" class="ml-auto btn btn-outline-success px-5 float-right" value="Save">
        </form>
        </div>
      </div>
    </div>
  </div>
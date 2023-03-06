<div class="modal fade" id="recentView{{ $r->id_file }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ $r->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 py-3 px-3">
            <img src="{{ asset($file::getIcon($r->route, $r->type)) }}" class="col-sm-12">
        </div>
      </div>
    </div>
  </div>
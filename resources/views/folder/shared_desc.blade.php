<div class="modal fade" id="folderDescShare{{ $r->id_folder }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            {{ substr($r->folder->name, 0, 60) }}
            @if (strlen($r->folder->name) > 60)
              ...
            @endif
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0 py-3 px-3">
            Owner: {{ $r->folder->user->full_name }}
            <br>
            Parent Folder:
            @if(isset($r->folder->folder))
              {{ $r->folder->folder->name }}
            @endif
            <hr>
            Last Modified: {{ $r->folder->updated_at }}
            <br>
            Created at: {{ $r->folder->created_at }}
        </div>
      </div>
    </div>
  </div>
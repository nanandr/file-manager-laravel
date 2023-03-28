<div class="modal fade" id="fileView{{ $r->file->id_file }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ substr($r->file->name, 0, 60) }}@if (strlen($r->file->name) > 60)...@endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3 px-3">
          <img src="{{ asset($file->getIcon($r->file->route, $r->file->type)) }}" class="col-sm-12">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="videoView{{ $r->file->id_file }}" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ substr($r->file->name, 0, 60) }}@if (strlen($r->file->name) > 60)...@endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="pauseFile('video{{ $r->file->id_file }}')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3 px-3 text-center">
        <video id="video{{ $r->file->id_file }}" class="col-sm-12" controls>
          <source src="{{ asset('uploads/'.$r->file->route) }}" type="video/{{ $r->file->type }}" class="col-sm-12">
        </video>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="audioView{{ $r->file->id_file }}" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ substr($r->file->name, 0, 60) }}@if (strlen($r->file->name) > 60)...@endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="pauseFile('audio{{ $r->file->id_file }}')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3 px-3 text-center">
        <audio id="audio{{ $r->file->id_file }}" class="col-sm-12" controls>
          <source src="{{ asset('uploads/'.$r->file->route) }}" type="audio/{{ $r->file->type }}" class="col-sm-12">
        </audio>
      </div>
    </div>
  </div>
</div>
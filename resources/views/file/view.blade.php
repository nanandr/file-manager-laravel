<div class="modal fade" id="fileView{{ $r->id_file }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ substr($r->name, 0, 60) }}@if (strlen($r->name) > 60)...@endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3 px-3">
          <img src="{{ asset($file->getIcon($r->route, $r->type)) }}" class="col-sm-12">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="videoView{{ $r->id_file }}" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ substr($r->name, 0, 60) }}@if (strlen($r->name) > 60)...@endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="pauseFile('video{{ $r->id_file }}')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3 px-3 text-center">
        <video id="video{{ $r->id_file }}" class="col-sm-12" controls="true">
          <source src="{{ asset('uploads/'.$r->route) }}" type="video/{{ $r->type }}" class="col-sm-12">
        </video>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="audioView{{ $r->id_file }}" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ substr($r->name, 0, 60) }}@if (strlen($r->name) > 60)...@endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" tabindex="-1" onclick="pauseFile('audio{{ $r->id_file }}')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 py-3 px-3 text-center">
        <audio id="audio{{ $r->id_file }}" class="col-sm-12" controls="true">
          <source src="{{ asset('uploads/'.$r->route) }}" type="audio/{{ $r->type }}" class="col-sm-12">
        </audio>
      </div>
    </div>
  </div>
</div>
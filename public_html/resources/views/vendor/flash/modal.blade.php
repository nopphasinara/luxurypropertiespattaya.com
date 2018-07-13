<div class="modal fade flash-overlay-modal {{ $modalClass or '' }}" id="flash-overlay-modal" tabindex="-1" role="dialog" aria-labelledby="flash-overlay-modal-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0 m-0">
        {!! $title !!}
        {!! $body !!}
      </div>
      {{-- <div class="modal-footer p-0 m-0">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div> --}}
    </div>
  </div>
</div>

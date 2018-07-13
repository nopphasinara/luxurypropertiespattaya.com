@push('header.scripts')
  <link href="{{ asset('lib/slider/slider.css') }}" rel="stylesheet">
@endpush
@push('footer.scripts')
  <script src="{{ asset('lib/slider/slider.js') }}"></script>
  <script>
  $(document).ready(function () {
    var thumbnailSliderOptions =
    {
        sliderId: "thumbnail-slider",
        orientation: "horizontal",
        thumbWidth: "50%",
        thumbHeight: "auto",
        showMode: 3,
        autoAdvance: true,
        selectable: true,
        slideInterval: 5000,
        transitionSpeed: 1000,
        shuffle: false,
        startSlideIndex: 0,
        pauseOnHover: true,
        initSliderByCallingInitFunc: false,
        rightGap: 0,
        keyboardNav: false,
        mousewheelNav: false,
        before: null,
    };

    var mcThumbnailSlider = new ThumbnailSlider(thumbnailSliderOptions);

    $('#thumbnail-slider li').on('click', function () {
      var target = $(this).attr('data-target');
      if (typeof target == 'undefined') {
        return false;
      }

      $(''+ target +'').modal('toggle');

      var a = $(this).find('a');
      if (a.length > 0) {
        var href = $(a[0]).attr('href');
        if (typeof href == 'undefined') {
          return false;
        }
      }
    });
  });
  </script>
@endpush

<div class="row">
  <div class="container">
    <div class="col-12 position-relative">
      <div class="thumbnail-slider py-2">
        <div class="bg-overlay bg-white position-absolute w-100 h-100" style="z-index: 5 !important;"></div>
        <div id="thumbnail-slider" class="position-relative" style="z-index: 10 !important;">
          <div class="inner">
            <ul>
              @for ($i= 0; $i < 9; $i++)
                <li data-toggle="modal" data-target="#bd-example-modal-lg-{!! $i !!}"><a class="thumb" href="{{ $property->image }}" target="_blank"></a></li>
              @endfor
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@for ($i = 0; $i < 9; $i++)
  <div class="modal fade" id="bd-example-modal-lg-{!! $i !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 90% !important;">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-header d-none">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0 bg-transparent text-center">
        <img src="{!! $property->image !!}" alt="...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="d-none btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endfor

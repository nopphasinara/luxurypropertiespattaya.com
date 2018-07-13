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
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                    <li><a class="thumb" href="{{ $property->image }}"></a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

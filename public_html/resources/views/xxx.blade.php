@push('footer.scripts')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
  <script src="{!! asset('lib/xxx/jquery.touchSwipe.min.js') !!}"></script>
  <script src="{!! asset('lib/xxx/allinone_carousel.js') !!}"></script>
  <script>
  $(document).ready(function () {
    $('.all-slide').allinone_carousel({
      skin: 'charming',
      // width: '100%',
      // height: 408,
      autoPlay: 10,
      resizeImages: true,
      autoHideBottomNav: false,
      showElementTitle: false,
      verticalAdjustment: 50,
      showPreviewThumbs: false,
      //easing: 'easeOutBounce',
      numberOfVisibleItems: 5,
      nextPrevMarginTop: 0,
      playMovieMarginTop: 0,
      bottomNavMarginBottom: -10,
      responsive: true,
    });
    
    // $('.allinone_carousel, .contentHolder').css('width', ($('#main .container').innerWidth() - 30) + 'px');
  });
  </script>
@endpush
<link rel="stylesheet" href="{!! asset('lib/xxx/allinone_carousel.css') !!}">
<div class="row">
  <div class="col-12 position-relative">
    <!--Banner-->
    <div class="all-slide" style="width: 100% !important;">
      <div class="myloader"></div>
      <!-- CONTENT -->
      <ul class="allinone_carousel_list">
        <li><img src="{!! $property->image !!}" alt="" /></li>
        <li><img src="{!! $property->image !!}" alt="" /></li>
        <li><img src="{!! $property->image !!}" alt="" /></li>
        <li><img src="{!! $property->image !!}" alt="" /></li>
        <li><img src="{!! $property->image !!}" alt="" /></li>
        <li><img src="{!! $property->image !!}" alt="" /></li>
        <li><img src="{!! $property->image !!}" alt="" /></li>
      </ul>
    </div>
    <!--end Banner-->
  </div>
</div>

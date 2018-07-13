@extends('layouts.main')

@push('header.scripts')
  <link href="{{ asset('lib/demo.css') }}" rel="stylesheet">
@endpush

@section('content')
  <div id="da-vinci-carousel" class="position-relative" style="width: 75%; height: 510px;">
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>
    <a href="{{ asset('images/demo-property.jpg') }}" rel="lightbox" title="">
      <img class="cloudcarousel" src="{{ asset('images/demo-property.jpg') }}" width="auto" height="384" alt="ALT">
    </a>

    <div id="da-vinci-title"  ></div>
    <div id="da-vinci-alt" ></div>

    <div id="but1" class="carouselLeft" style="position:absolute;top:20px;right:64px;"></div>
    <div id="but2" class="carouselRight" style="position:absolute;top:20px;right:20px;"></div>
  </div>
@endsection

@push('footer.scripts')
  <script src="{{ asset('/lib/jquery.min.js') }}"></script>
  <script src="{{ asset('/lib/script.js') }}"></script>
  <script>
  $(document).ready(function(){
    $("#da-vinci-carousel").CloudCarousel({
      reflHeight: 56,
      reflGap: 3,
      titleBox: $('#da-vinci-title'),
      altBox: $('#da-vinci-alt'),
      buttonLeft: $('#but1'),
      buttonRight: $('#but2'),
      yRadius: 40,
      xPos: ($("#da-vinci-carousel").outerWidth() / 2),
      yPos: 40,
      speed: .1,
      mouseWheel: false,
      showShadow: false,
      showReflection: false,
      frontItemClass: 'aaa',
    });
  });
</script>
@endpush

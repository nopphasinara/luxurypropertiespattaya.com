@extends('layouts.main')


@section('meta_title', $property->name)
@section('meta_description', $property->description)
@section('meta_keywords', $property->keywords)
@section('meta_image', $property->thumbnail)
@section('meta_type', 'article')

@push('footer.scripts')
  {{-- <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b1046d0c1304515"></script> --}}
@endpush


@section('header')
  @include('partials.header.header')
@endsection


@section('content')
  @component('components.page-title')
    @slot('title', $property->name)
    {{-- @slot('subtitle', 'Reference #: RC-12345') --}}
  @endcomponent

  <div class="container">
    <div class="row mb-4">
      <div class="col-12">
        <!-- #preview-image -->
        <div id="preview-image" class="bg-wrapper rounded-sm h-580px">
          <div class="bg-image">
            <img src="{{ $property->thumbnail }}" alt="{{ $property->name }}">
          </div>
        </div>
        <!-- /#preview-image -->
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        @if ($property->content)
          <div id="description" class="mb-1x">
            {!! $property->content !!}
          </div><!-- /#description -->
        @endif

        @if ($property->for_sale || $property->for_rent)
          <div id="property-info" class="mb-6 bg-gray-200">
            <div class="row">
              @if ($property->for_sale && $property->sale_price)
                <div class="col-12 col-lg-6">
                  <div class="text-4 rounded bg-primary text-center text-white bold px-2 py-1 mb-1">
                    Sale ฿{{ $property->sale_price }}
                  </div>
                </div>
              @endif
              @if ($property->for_rent && $property->rent_price)
                <div class="col-12 col-lg-6">
                  <div class="text-4 rounded bg-secondary text-center bold px-2 py-1">
                    Rent ฿{{ $property->rent_price }}/month
                  </div>
                </div>
              @endif
            </div>
          </div><!-- /#property-info -->
        @endif
        
        @include('components.properties-facilities')
      </div>
      <div class="col-md-4">
        @include('components.share-buttons')

        <div class="component-ads mb-6">
          @include('components.business-ads', ['featured' => true])
        </div><!-- /.component-ads -->
      </div>
    </div>
    
    <div class="row pb-6">
      <div class="col-12">
        @if ($property->video_id)
          <div id="gallery-video" class="mb-4">
            <h3 class="bold text-uppercase mb-2">Watch The Video</h3>
            <div class="bg-gray-800 box-shadow">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $property->video_id }}?rel=0&amp;showinfo=0" allowfullscreen></iframe>
              </div>
            </div>
          </div><!-- /#gallery-video -->
        @endif

        @if ($property->gallery)
          @include('components.gallery-with-fancybox')
        @endif
      </div>
    </div>
    
    <div class="row pb-6">
      <div class="col-md-8">
        @if ($property->features_list)
          @include('components.features-list')
        @endif

        <!-- #property-location -->
        @if ($property->lat && $property->lng)
          <div id="property-location" class="mb-1x">
            <h3 class="bold text-uppercase mb-2">Location</h3>
            <div id="google-map" class="box-shadow bg-gray-800 h-540px"></div>
          </div>
          @push('footer.scripts')
            <script>
            function initMap() {
              var uluru = {lat: {{ $property->lat }}, lng: {{ $property->lng }}};
              var map = new google.maps.Map(document.getElementById('google-map'), {
                zoom: 10,
                center: uluru
              });
              var marker = new google.maps.Marker({
                position: uluru,
                map: map
              });
            }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap"></script>
          @endpush
        @endif
        <!-- /#property-location -->

        <!-- .component-contact -->
        <div class="component-contact text-center mb-6 mb-md-0">
          <p class="h3 text-gray-800 bold">
            Contact us now to arrange a No-Obligation Viewing
          </p>
          <p class="lead">
            Call Adrian <a class="bold text-primary" href="tel:+66{{ preg_replace("/[^0-9a-zA-Z]/i", "", site('phone_number')) }}">{{ site('phone_number') }}</a> or email <a class="bold text-primary" href="mailto:{{ site('emails.primary') }}">{{ site('emails.primary') }}</a>
          </p>
        </div>
        <!-- /.component-contact -->
      </div>
      <div class="col-md-4">
        <div class="component-info bg-primary text-white">
          <h4 class="mb-0 bg-1d-primary text-1l-gold bold text-uppercase px-3 py-2">In The Local Area</h4>
          <p class="px-3 pt-2 py-0 mb-4">
            Moving into your new home is an exciting adventure, as is finding out what is happening in the local area surrounding you. Take a look at our videos to see more information about local schools, hospitals, shopping centers, restaurants, entertainment as well as places to visit.
          </p>

          <div class="component-video px-3 pb-2">
            <ul class="list-unstyled">
              <li class="mb-4">
                <h5 class="bold text-white">Pattaya City</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/26zhz0_TRho?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </li>
              <li class="mb-4">
                <h5 class="bold text-white">Schools and Amenities</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8iW2cMgG4W4?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </li>
              <li class="mb-4">
                <h5 class="bold text-white">Eating Out</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NVfMj0DAXz0?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
                </li>
              <li>
                <h5 class="bold text-white">Places of Interest</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/joE8Mn4hWoY?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </li>
            </ul>
          </div><!-- /.component-video -->
        </div><!-- /.component-info -->
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

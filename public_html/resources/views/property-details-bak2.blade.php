@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', '<span class="h2x">Stunning 6 Bed House for sale</span>')
    {{-- @slot('subtitle', 'Reference #: RC-12345') --}}
  @endcomponent

  <div class="container">
    <div class="row mb-6">
      <div class="col-12">
        <!-- #preview-image -->
        <div id="preview-image" class="bg-wrapper h-600px box-shadow bg-gray-800">
          <div class="bg-image">
            <a href="#">
              <img src="{{ wix('f8c85e_aeaf7f74884244fda3dcf061a9811d85~mv2.jpg/v1/fill/w_768,h_359,al_c,lg_1,q_80/f8c85e_aeaf7f74884244fda3dcf061a9811d85~mv2.webp') }}" width="100%" alt="">
            </a>
          </div>
        </div>
        <!-- /#preview-image -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <!-- #description -->
        <div id="description" class="mb-4">
          <p class="lead">This 7 bed villa that has recently come onto the market is up for sale and an incredibly attractive price. Situated close to the Phoenix Golf Course, the location is perfect for those who love a game of golf as well as those who need to be in a central location that has access to Bangkok, Raying and Pattaya.</p>

          <p class="lead">This 7 bed villa is sited on a large land plot of 1,600sqm, and has a massive 900 sqm of living area. This wonderful house is perfect for larger families and for those who enjoy entertaining friends and family. If you are looking for a spacious, luxury home that has plenty of space, is well designed and built to last, then you need to watch the video below.</p>
        </div>
        <!-- /#description -->

        <!-- #property-info -->
        <div id="property-info" class="mb-4 bg-gray-200">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="text-4 rounded bg-primary text-center text-white bold px-2 py-1 mb-1">
                Sale ฿19,000,000
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="text-4 rounded bg-secondary text-center bold px-2 py-1">
                Rent ฿19,000/month
              </div>
            </div>
          </div>
        </div>
        <!-- /#property-info -->

        <!-- #gallery-video -->
        <div id="gallery-video" class="mb-4">
          <h3 class="bold text-uppercase mb-2">Watch The Video</h3>
          <div class="bg-gray-800 box-shadow">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7eR0ie9DgXs?rel=0&amp;showinfo=0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <!-- /#gallery-video -->

        <!-- #facilities -->
        <div id="facilities" class="mb-4">
          <div class="row">
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Living area: 900 sqm
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> 8m x 7m Swimming Pool
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Land size: 1600 sqm
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Spacious Lounge
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> 7 Bedroom (3 on-Suite)
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Office/Study
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> 5 Bathroom
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Landscaped Gardens
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Large European Kitchen
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Ownership: Company Owned
            </div>
          </div>
        </div>
        <!-- /#facilities -->
      </div>
      <div class="col-md-4">
        <!-- .component-ads -->
        <div class="component-ads mb-6">
          <div class="text-center">
            <img src="{{ asset('/images/ads-1.jpg') }}" width="100%" alt="...">
          </div>
        </div>
        <!-- /.component-ads -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- #gallery -->
        <div class="gallery-wrapper py-1 mb-6 bg-gray-200">
          <div id="gallery" class="carousel slide no-absolute" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @for ($i = 1; $i <= 3; $i++)
                <div class="carousel-item {!! $active = ($i == 1) ? 'active' : '' !!}">
                  <div class="row no-gutters">
                    @for ($ii = 1; $ii <= 6; $ii++)
                      <div class="col-4 col-md-2">
                        <div class="bg-wrapper h-140px my-5px mx-5px">
                          <a href="#">
                            <div class="bg-image">
                              <img src="http://placehold.it/100px80" alt="{{ $i }}">
                            </div>
                          </a>
                        </div>
                      </div>
                    @endfor
                  </div>
                </div>
              @endfor
            </div>
            <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div><!-- /.gallery-wrapper -->
        <!-- /#gallery -->

        <!-- #property-features -->
        <div id="property-features" class="mb-2x">
          <h3 class="bold text-uppercase">Features</h3>
          <div class="row mb-1x">
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Western kitchen
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Large terrace
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Water pump
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Large balcony
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Washing machine
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Jacuzzi
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Store room
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Internet
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Satelite TV
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Hot & cold water
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Rural views
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Guest cottage
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Reserve water tank
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Fully furnished
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Private pool
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Entertainment room
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Private garden
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> En-suite
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Personal security system
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Cable TV
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Office
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Barbeque area
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Maids quarter
            </div>
            <div class="col-12 col-sm-6 col-md-3 mb-1">
              <i class="fa fa-fw fa-circle text-primary"></i> Air conditioning
            </div>
          </div>
        </div>
        <!-- /#property-features -->

        <!-- #property-location -->
        <div id="property-location" class="mb-2x">
          <h3 class="bold text-uppercase mb-2">Location</h3>
          <div id="google-map" class="box-shadow bg-gray-800">
            <div id="comp-ii8oy6z1" title="Google Maps" aria-label="Google Maps">
              <div id="comp-ii8oy6z1mapContainer" class="gm1mapContainer h-540px">
                <iframe width="100%" height="100%" frameborder="0" scrolling="no" title="Google Maps" aria-label="Google Maps" src="https://static.parastorage.com/services/santa/1.2764.29/static/external/googleMap.html?language=en"></iframe>
              </div>
            </div>
          </div>
        </div>
        <!-- /#property-location -->

        <!-- #in-the-local -->
        <div id="in-the-local" class="mb-4">
          <h3 class="bold text-uppercase mb-2">In The Local Area</h3>
          <p class="lead mb-4">
            Moving into your new home is an exciting adventure, as is finding out what is happening in the local area surrounding you. Take a look at our videos to see more information about local schools, hospitals, shopping centers, restaurants, entertainment as well as places to visit.
          </p>

          <!-- #local-videos -->
          <div id="local-videos">
            <div class="row">
              <div class="col-6 mb-4">
                <h4 class="text-primary bold">Pattaya City</h4>
                <div class="embed-responsive embed-responsive-16by9 box-shadow bg-gray-800">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/26zhz0_TRho?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-6 mb-4">
                <h4 class="text-primary bold">Schools and Amenities</h4>
                <div class="embed-responsive embed-responsive-16by9 box-shadow bg-gray-800">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8iW2cMgG4W4?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-6 mb-4">
                <h4 class="text-primary bold">Eating Out</h4>
                <div class="embed-responsive embed-responsive-16by9 box-shadow bg-gray-800">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NVfMj0DAXz0?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-6 mb-4">
                <h4 class="text-primary bold">Places of Interest</h4>
                <div class="embed-responsive embed-responsive-16by9 box-shadow bg-gray-800">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/joE8Mn4hWoY?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- /#local-videos -->
        </div>
        <!-- /#in-the-local -->

        <!-- #contact-info -->
        <div id="contact-info" class="text-center bg-2l-gray-500 px-6 py-4 box-shadow">
          <p class="text-3 bold mb-0">
            Contact us now to arrange a No-Obligation Viewing.
          </p>
          <p class="text-3 text-primary">
            Call Adrian <a class="bold text-primary" href="tel:+66{{ preg_replace("/[^0-9a-zA-Z]/i", "", site('phone_number')) }}">{{ site('phone_number') }}</a> or email <a class="bold text-primary" href="mailto:{{ site('emails.primary') }}">{{ site('emails.primary') }}</a>
          </p>
        </div>
        <!-- /#contact-info -->
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

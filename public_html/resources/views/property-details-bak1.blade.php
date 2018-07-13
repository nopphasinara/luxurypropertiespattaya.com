@extends('layouts.main')

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
            <img src="{!! $property->image !!}" alt="{!! $property->image !!}">
          </div>
        </div>
        <!-- /#preview-image -->
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <!-- #gallery -->
        <div class="gallery-wrapper py-1 mb-6 bg-gray-200">
          <div id="gallery" class="carousel slide no-absolute" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @for ($i = 1; $i <= 3; $i++)
                <div class="carousel-item {!! $active = ($i == 1) ? 'active' : '' !!}">
                  <div class="row no-gutters">
                    @for ($ii = 1; $ii <= 6; $ii++)
                      <div class="col-4 col-md-2">
                        <div class="bg-wrapper h-80px my-5px mx-5px">
                          <a href="#">
                            <div class="bg-image">
                              <img src="..." alt="{{ $i }}">
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

        <!-- #description -->
        <div id="description" class="mb-1x">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <!-- /#description -->

        @include('xxx')

        <!-- #gallery-video -->
        <div id="gallery-video" class="mb-2x">
          <h3 class="bold text-uppercase mb-2">Watch The Video</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7eR0ie9DgXs?rel=0&amp;showinfo=0" allowfullscreen></iframe>
          </div>
        </div>
        <!-- /#gallery-video -->

        <div class="row mb-1x">
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Living area: 900 sqm</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> 8m x 7m Swimming Pool</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Land size: 1600 sqm</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Spacious Lounge</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> 7 Bedroom (3 on-Suite)</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Office/Study</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> 5 Bathroom</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Landscaped Gardens</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Large European Kitchen</div>
          <div class="col-12 col-sm-6"><i class="fa fa-fw fa-check text-success"></i> Ownership: Company Owned</div>
        </div>

        <h3 class="bold text-uppercase">Features</h3>
        <div class="row mb-1x">
          <div class="col-12 col-sm-6">Western kitchen</div>
          <div class="col-12 col-sm-6">Large terrace</div>
          <div class="col-12 col-sm-6">Water pump</div>
          <div class="col-12 col-sm-6">Large balcony</div>
          <div class="col-12 col-sm-6">Washing machine</div>
          <div class="col-12 col-sm-6">Jacuzzi</div>
          <div class="col-12 col-sm-6">Store room</div>
          <div class="col-12 col-sm-6">Internet</div>
          <div class="col-12 col-sm-6">Satelite TV</div>
          <div class="col-12 col-sm-6">Hot & cold water</div>
          <div class="col-12 col-sm-6">Rural views</div>
          <div class="col-12 col-sm-6">Guest cottage</div>
          <div class="col-12 col-sm-6">Reserve water tank</div>
          <div class="col-12 col-sm-6">Fully furnished</div>
          <div class="col-12 col-sm-6">Private pool</div>
          <div class="col-12 col-sm-6">Entertainment room</div>
          <div class="col-12 col-sm-6">Private garden</div>
          <div class="col-12 col-sm-6">En-suite</div>
          <div class="col-12 col-sm-6">Personal security system</div>
          <div class="col-12 col-sm-6">Cable TV</div>
          <div class="col-12 col-sm-6">Office</div>
          <div class="col-12 col-sm-6">Barbeque area</div>
          <div class="col-12 col-sm-6">Maids quarter</div>
          <div class="col-12 col-sm-6">Air conditioning</div>
        </div>

        <h3 class="bold text-uppercase mb-2">Location</h3>
        <!-- #google-map -->
        <div id="google-map" class="box-shadow bg-gray-800">
          <div id="comp-ii8oy6z1" title="Google Maps" aria-label="Google Maps">
            <div id="comp-ii8oy6z1mapContainer" class="gm1mapContainer h-450px">
              <iframe width="100%" height="100%" frameborder="0" scrolling="no" title="Google Maps" aria-label="Google Maps" src="https://static.parastorage.com/services/santa/1.2764.29/static/external/googleMap.html?language=en"></iframe>
            </div>
          </div>
        </div>
        <!-- /#google-map -->
      </div>
      <div class="col-md-4">
        <!-- .component-property-info -->
        <div class="component-property-info bg-gray-200 mb-1x">
          <div class="row">
            <div class="col-12">
              <div class="box-shadow">
                <p class="bold lead bg-1d-gray-200 px-3 py-2 mb-0">
                  Ref.No: RC-12345
                </p>
                <div class="px-3 py-2">
                  <p class="lead mb-0">
                    <i class="fa fa-map-marker"></i> <a href="{{ _url('/pattaya/') }}">Pattaya</a>
                  </p>
                  <p class="lead mb-0">
                    <i class="fa fa-home"></i> <a href="{{ _url('/houses/') }}">House</a>
                  </p>
                  <p class="lead mb-0">
                    <i class="fa fa-bed"></i> 6 Beds
                  </p>
                  <p class="lead mb-0">
                    <i class="fa fa-bath"></i> 7 Baths
                  </p>
                  <p class="lead mb-0">
                    <i class="fa fa-area-chart"></i> 900 sq.m.
                  </p>
                </div>
                <div class="px-2 pb-2">
                  <div class="box-shadow rounded bg-primary lead text-center text-white bold px-2 py-1 mb-1">
                    Sale ฿19,000,000
                  </div>
                  <div class="box-shadow rounded bg-secondary lead text-center text-white bold px-2 py-1">
                    Rent ฿19,000/month
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.component-property-info -->

        <!-- .component-ads -->
        <div class="component-ads mb-6 d-none">
          <div class="">
            <img src="{{ wix('f8c85e_03692c6dd13b4bfbafb0c9000d8855ab~mv2.jpg/v1/fill/w_300,h_600,al_c,q_80/f8c85e_03692c6dd13b4bfbafb0c9000d8855ab~mv2.webp') }}" width="100%" alt="">
          </div>
        </div>
        <!-- /.component-ads -->

        <!-- .component-info -->
        <div class="component-info bg-primary text-white">
          <h4 class="mb-0 bg-1d-primary text-1l-gold bold text-uppercase px-3 py-2">In The Local Area</h4>
          <p class="px-3 pt-2 py-0 mb-4">
            Moving into your new home is an exciting adventure, as is finding out what is happening in the local area surrounding you. Take a look at our videos to see more information about local schools, hospitals, shopping centers, restaurants, entertainment as well as places to visit.
          </p>

          <!-- .component-video -->
          <div class="component-video px-3 pb-2">
            <ul class="list-unstyled">
              <li class="mb-4">
                <h5 class="bold">Pattaya City</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/26zhz0_TRho?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </li>
              <li class="mb-4">
                <h5 class="bold">Schools and Amenities</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8iW2cMgG4W4?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </li>
              <li class="mb-4">
                <h5 class="bold">Eating Out</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NVfMj0DAXz0?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
                </li>
              <li>
                <h5 class="bold">Places of Interest</h5>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/joE8Mn4hWoY?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                </div>
              </li>
            </ul>
          </div>
          <!-- /.component-video -->
        </div>
        <!-- /.component-info -->

        <!-- .component-contact -->
        <div class="component-contact text-center bg-2l-gray-500 px-3 py-2">
          <p class="lead bold">
            Contact us now to arrange a
            <br>
            No-Obligation Viewing
          </p>
          <p class="lead">
            Call Us or Send Us A Message
          </p>
          <p class="lead">
            <a class="bold text-primary" href="tel:+66{{ preg_replace("/[^0-9a-zA-Z]/i", "", site('phone_number')) }}">{{ site('phone_number') }}</a>
            <br>
            <a class="bold text-primary" href="mailto:{{ site('emails.primary') }}">{{ site('emails.primary') }}</a>
          </p>
        </div>
        <!-- /.component-contact -->
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

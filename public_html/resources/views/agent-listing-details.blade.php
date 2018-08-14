@prepend('body.after')
  <script>
  function initMap() {
    var uluru = {lat: {{ config('custom.lat') }}, lng: {{ config('custom.lng') }}};
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
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap"></script>
@endprepend

@extends('layouts.main-agent')

@section('content')
  @include('partials.modules.agent-search-inside')

  <section id="section-body">

      <!--start detail top-->
      <div class="detail-top detail-top-grid no-margin">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-xs-12">
              <div class="header-detail table-list">
                <div class="header-left">
                  <h1>
                    Oceanfront Villa With Pool
                    <span class="label-wrap hidden-sm hidden-xs">
                      <span class="label label-default">LPP-1234</span>
                      <span class="label label-primary">For Sale</span>
                      <span class="label label-danger">Sold</span>
                    </span>
                  </h1>
                  <div class="listing-address">
                    <ul class="list-inline">
                      <li><i class="fa fa-fw fa-building"></i> House</li>
                      <li><i class="fa fa-fw fa-map-marker"></i> Pattaya</li>
                    </ul>
                  </div>
                </div>
                <div class="header-right">
                  <span class="item-price">$575,000</span>
                  <span class="item-sub-price">$21,000/mo</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end detail top-->

      <!--start detail content-->
      <section class="section-detail-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
              <div class="detail-bar">
                <div class="detail-media detail-top-slideshow">
                  <div class="tab-content">

                    <div id="gallery" class="tab-pane fade in active">
                      <span class="label-wrap visible-sm visible-xs">
                        <span class="label label-primary">For Sale</span>
                        <span class="label label-danger">Sold</span>
                      </span>
                      <div class="slideshow">
                        <div class="slideshow-main">
                          <div class="slide">
                            @for ($i = 0; $i < 16; $i++)
                              <div>
                                <img src="https://placehold.it/810x430" width="810" height="430" alt="Slide show">
                              </div>
                            @endfor
                          </div>
                        </div>
                        <div class="slideshow-nav-main">
                          <div class="slideshow-nav">
                            @for ($i = 0; $i < 16; $i++)
                              <div>
                                <img src="https://placehold.it/120x90" width="120" height="90" alt="Slide show thumb">
                              </div>
                            @endfor
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="property-description detail-block">
                  <div class="detail-title">
                    <h2 class="title-left">Description</h2>
                  </div>
                  <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, condimentum feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. </p>
                  <p>Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. </p>
                </div>

                <div class="detail-list detail-block">
                  <div class="detail-title">
                    <h2 class="title-left">Detail</h2>
                  </div>
                  <div class="alert alert-info">
                    <ul class="list-three-col">
                      <li><strong>Property ID:</strong> HZ33</li>
                      <li><strong>Price:</strong> $670,000</li>
                      <li><strong>Property Size:</strong> 1200 Sq Ft</li>
                      <li><strong>Bedrooms:</strong> 4</li>
                      <li><strong>Bathrooms:</strong> 2</li>
                      <li><strong>Garage:</strong> 1</li>
                      <li><strong>Garage Size:</strong> 200 SqFt</li>
                      <li><strong>Year Built:</strong> 2016-01-09</li>
                    </ul>
                  </div>
                  <div class="detail-title-inner">
                    <h4 class="title-inner">Additional details</h4>
                  </div>
                  <ul class="list-three-col">
                    <li><strong>Deposit:</strong> 20%</li>
                    <li><strong>Pool Size:</strong> 300 Sqft</li>
                    <li><strong>Last remodel year:</strong> 1987</li>
                    <li><strong>Amenities:</strong> Clubhouse</li>
                    <li><strong>Additional Rooms::</strong> Guest Bath</li>
                    <li><strong>Equipment:</strong> Grill - Gas</li>
                  </ul>
                </div>
                <div class="detail-features detail-block">
                  <div class="detail-title">
                    <h2 class="title-left">Features</h2>
                  </div>
                  <ul class="list-three-col list-features">
                    <li><a href="#"><i class="fa fa-check"></i>Air Conditioning</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Barbeque</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Dryer</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Gym</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Laundry</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Lawn</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Microwave</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Outdoor Shower</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Refrigerator</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Sauna</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Swimming Pool</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>TV Cable</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Washer</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>WiFi</a></li>
                    <li><a href="#"><i class="fa fa-check"></i>Window Coverings</a></li>
                  </ul>
                </div>

                <div class="listing-video">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/foo?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>

                <div id="google-map" class="listing-map"></div>

                <div class="detail-contact detail-block">
                  <div class="detail-title">
                    <h2 class="title-left">Inquire about this property</h2>
                  </div>
                  <form>
                    <div class="row">
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <input class="form-control" placeholder="Your Name" type="text">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <input class="form-control" placeholder="Phone" type="text">
                        </div>
                      </div>
                      <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                          <input class="form-control" placeholder="Email" type="email">
                        </div>
                      </div>
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-group">
                          <textarea class="form-control" rows="5" placeholder="Messages"></textarea>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary"><strong>SEND REQUEST</strong></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
              <aside id="sidebar">
                <div class="widget widget-download">
                  <div class="widget-top">
                    <h3 class="widget-title">Contact Agent</h3>
                    <div class="divider divider-lg"></div>
                  </div>
                  <div class="widget-body">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-fw fa-user"></i> Kenneth Phllips</li>
                        <li><i class="fa fa-fw fa-mobile"></i> (987) 654 3210</li>
                        <li><i class="fa fa-fw fa-envelope"></i> info@domain.com</li>
                        <li>
                          <br>
                          <ul class="sub-list list-inline">
                            <li><a href="#"><i class="fab fa-lg fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-lg fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-lg fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-lg fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-lg fa-pinterest"></i></a></li>
                          </ul>
                        </li>
                      </ul>
                  </div>
                </div>
                <div class="widget widget-recommend">
                  <div class="widget-top">
                    <h3 class="widget-title">Featured Properties</h3>
                  </div>
                  <div class="widget-body">
                    @for ($i = 0; $i < 5; $i++)
                      <div class="media">
                        <div class="media-left">
                          <figure class="item-thumb">
                            <a class="hover-effect" href="#">
                              <img alt="thumb" src="https://placehold.it/100x75" width="100" height="75">
                            </a>
                          </figure>
                        </div>
                        <div class="media-body">
                          <h3 class="media-heading"><a href="#">Apartment Oceanview</a></h3>
                          <div class="rating">
                            <span class="star-text-left">$350,000</span>
                          </div>
                          <div class="amenities">
                            <p>3 beds • 2 baths • 1,238 sqft</p>
                            <p>Single Family Home</p>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>
                </div>
                <div class="widget widget-rated">
                  <div class="widget-top">
                    <h3 class="widget-title">Latest Properties</h3>
                  </div>
                  <div class="widget-body">
                    @for ($i = 0; $i < 8; $i++)
                      <div class="media">
                        <div class="media-left">
                          <figure class="item-thumb">
                            <a class="hover-effect" href="#">
                              <img alt="thumb" src="https://placehold.it/100x75" width="100" height="75">
                            </a>
                          </figure>
                        </div>
                        <div class="media-body">
                          <h3 class="media-heading"><a href="#">Apartment Oceanview</a></h3>
                          <div class="rating">
                            <span class="star-text-left">$350,000</span>
                          </div>
                          <div class="amenities">
                            <p>3 beds • 2 baths • 1,238 sqft</p>
                            <p>Single Family Home</p>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </section>
      <!--end detail content-->

  </section>

@endsection

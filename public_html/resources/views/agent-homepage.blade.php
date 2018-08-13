
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Houzez HTML5 Template</title>
    <!--Meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Houzez HTML5 Template">
    <meta name="description" content="Houzez HTML5 Template">
    <meta name="author" content="Favethemes">

    <link rel="stylesheet" href="{{ asset('packages/houzez/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/houzez/css/custom.css') }}" />

</head>
<body>

<!--start header section header v1-->
<header id="header-section" class="header-section-4 header-main  nav-left hidden-sm hidden-xs" data-sticky="1">
    <div class="container">
        <div class="header-left">
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </a>
            </div>
            <nav class="navi main-nav">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">For Sale</a>
                  <ul class="sub-menu">
                    <li><a href="#">East Pattaya Properties For Sale</a></li>
                    <li><a href="#">Golf Course Properties For Sale</a></li>
                    <li><a href="#">Jomtien Properties For Sale</a></li>
                    <li><a href="#">Naklua Properties For Sale</a></li>
                    <li><a href="#">Pattaya Properties For Sale</a></li>
                    <li><a href="#">Rayong Properties For Sale</a></li>
                  </ul>
                </li>
                <li><a href="#">For Rent</a>
                  <ul class="sub-menu">
                    <li><a href="#">East Pattaya Properties For Rent</a></li>
                    <li><a href="#">Golf Course Properties For Rent</a></li>
                    <li><a href="#">Jomtien Properties For Rent</a></li>
                    <li><a href="#">Naklua Properties For Rent</a></li>
                    <li><a href="#">Pattaya Properties For Rent</a></li>
                    <li><a href="#">Rayong Properties For Rent</a></li>
                  </ul>
                </li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="user">
                <a href="#" class="">Affiliate Sign In</a>
                <a href="#" class="btn btn-default"><i class="fa fa-trophy"></i> Earn With Us</a>
            </div>
        </div>
    </div>
</header>
<div class="header-mobile visible-sm visible-xs">
    <div class="container">
        <!--start mobile nav-->
        <div class="mobile-nav">
            <span class="nav-trigger"><i class="fa fa-navicon"></i></span>
            <div class="nav-dropdown main-nav-dropdown"></div>
        </div>
        <!--end mobile nav-->
        <div class="header-logo">
            <a href="index.html"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
        </div>
        <div class="header-user">
            <ul class="account-action">
                <li>
                    <span class="user-icon"><i class="fa fa-user"></i></span>
                    <div class="account-dropdown">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Log in / Register</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end header section header v1-->

    <div class="header-media">
        <div class="banner-parallax">
            <div class="banner-bg-wrap">
                <div class="banner-inner" style="background-image: url('http://placehold.it/2000x1440')"></div>
            </div>
        </div>
        <div class="banner-caption">
            <h1>Welcome To Miami Beach</h1>
            <h2 class="banner-sub-title">Parallax banner with search and image</h2>
        </div>
        <div class="search-expandable">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="search-inner-wrap">
                            {{-- <div class="search-expand-btn btn-primary active">Advanced Search</div> --}}
                            <div class="advanced-search">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-9 col-xs-12 search-expandable-left">
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Keywords...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <select class="selectpicker" data-live-search="false" data-live-search-style="begins" title="For Sale/Rent">
                                                            <option>For Sale/Rent</option>
                                                            <option>For Sale</option>
                                                            <option>For Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-group no-margin">
                                                        <select class="selectpicker" data-live-search="false" data-live-search-style="begins" title="Any Types">
                                                            <option>Any Types</option>
                                                            <option>Business</option>
                                                            <option>Condo</option>
                                                            <option>House</option>
                                                            <option>Land</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-6">
                                                    <div class="form-group">
                                                        <select class="selectpicker" data-live-search="false" data-live-search-style="begins" title="Any Locations">
                                                          <option>Any Locations</option>
                                                          <option>Pattaya</option>
                                                          <option>Jomtien</option>
                                                          <option>Naklua</option>
                                                          <option>East Pattaya</option>
                                                          <option>Rayong</option>
                                                          <option>Golf Course</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-12 search-expandable-right">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start section page body-->
    <section id="section-body">

        <!--start carousel module-->
        <div class="houzez-module-main">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>Latest for Sale</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-1-prev">Prev</button>
                                    <button class="btn btn-sm btn-crl-pprt-1-next">Next</button>
                                    <a href="#" class="btn btn-carousel btn-sm">All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-1 slide-animated">
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end carousel module-->

        <!--start carousel module-->
        <div class="houzez-module-main">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>Latest for Rent</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-2-prev">Prev</button>
                                    <button class="btn btn-sm btn-crl-pprt-2-next">Next</button>
                                    <a href="#" class="btn btn-carousel btn-sm">All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-2 slide-animated">
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">LPP-1234</div>
                                                        </div>
                                                        <span class="label-featured label label-success">Featured</span>
                                                        <div class="price hide-on-list">
                                                            <h3>$350,000</h3>
                                                            <p class="rant">$21,000/mo</p>
                                                        </div>
                                                        <a href="#" class="hover-effect">
                                                            <img src="http://placehold.it/355x240" alt="thumb">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">
                                                            <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                            <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>Beds: 3</span>
                                                                        <span>Baths: 2</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end carousel module-->

        <!--start property item module-->
        <div class="houzez-module-main">
            <div class="houzez-module module-title text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Best Property Value</h2>
                            <h3 class="sub-heading">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-item-module" class="houzez-module property-item-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="col-sm-6">
                                    <div class="item-wrap">
                                        <div class="property-item item-grid">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <div class="label-wrap hide-on-list">
                                                        <div class="label-status label label-default">LPP-1234</div>
                                                    </div>
                                                    <span class="label-featured label label-success">Featured</span>
                                                    <div class="price hide-on-list">
                                                        <h3>$350,000</h3>
                                                        <p class="rant">$21,000/mo</p>
                                                    </div>
                                                    <a href="#" class="hover-effect">
                                                        <img src="http://placehold.it/355x240" alt="thumb">
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="item-body">

                                                <div class="body-left">
                                                    <div class="info-row">
                                                        <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                        <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                    </div>
                                                    <div class="table-list full-width info-row">
                                                        <div class="cell">
                                                            <div class="info-row amenities">
                                                                <p>
                                                                    <span>Beds: 3</span>
                                                                    <span>Baths: 2</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item-wrap">
                                        <div class="property-item item-grid">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <div class="label-wrap hide-on-list">
                                                        <div class="label-status label label-default">LPP-1234</div>
                                                    </div>
                                                    <span class="label-featured label label-success">Featured</span>
                                                    <div class="price hide-on-list">
                                                        <h3>$350,000</h3>
                                                        <p class="rant">$21,000/mo</p>
                                                    </div>
                                                    <a href="#" class="hover-effect">
                                                        <img src="http://placehold.it/355x240" alt="thumb">
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="item-body">

                                                <div class="body-left">
                                                    <div class="info-row">
                                                        <h2 class="property-title"><a href="#">Apartment Oceanview</a></h2>
                                                        <h4 class="property-location"><i class="fa fa-fw fa-building-o"></i> House <i class="fa fa-fw fa-map-marker"></i> Pattaya</h4>
                                                    </div>
                                                    <div class="table-list full-width info-row">
                                                        <div class="cell">
                                                            <div class="info-row amenities">
                                                                <p>
                                                                    <span>Beds: 3</span>
                                                                    <span>Baths: 2</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="cell">
                                                            <div class="phone">
                                                                <a href="#" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end property item module-->

    </section>
    <!--end section page body-->


    <!--start footer section-->
    <footer class="footer-v2">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="footer-widget widget-about">
                            <div class="widget-top">
                                <h3 class="widget-title">About {{ $user->name }}</h3>
                            </div>
                            <div class="widget-body">
                                <p>Lorem ipsum dolor sit amet consectetur incididunt ut labore et ipsum dolor sit amet consectetur incididunt ut labore et dolore magna aliqua adipisicing elit seddo eiusmod tem magna aliqua adipisicing.</p>
                                <p class="read"><a href="#"><strong>Read more</strong> <i class="fa fa-caret-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-widget widget-contact">
                            <div class="widget-top">
                                <h3 class="widget-title">Contact {{ $user->name }}</h3>
                            </div>
                            <div class="widget-body">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-location-arrow"></i> 121 King Street, Melbourne VIC 3000</li>
                                    <li><i class="fa fa-phone"></i> +1 (877) 987 3487</li>
                                    <li><i class="fa fa-envelope"></i> <a href="#"><strong>info@housez.com</strong></a></li>
                                </ul>
                                <p class="read"><a href="contact-us.html"><strong>Contact us</strong> <i class="fa fa-caret-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-widget widget-newsletter">
                            <div class="widget-top">
                                <h3 class="widget-title">Follow Us On</h3>
                            </div>
                            <div class="widget-body">
                                <p>
                                  Houzez is a premium theme for real estate agents.<br>
                                  Don’t forget to fullow us on:
                                </p>
                                <ul class="social">
                                    <li>
                                        <a href="#" class="btn-facebook"><i class="fa fa-2x fa-facebook-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-twitter"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-google-plus"><i class="fa fa-2x fa-google-plus-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-linkedin"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-col">
                            <p>Houzez - All rights reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-col">
                            <div class="navi">
                                <ul id="footer-menu" class="">
                                    <li><a href="privacy.html">Privacy</a></li>
                                    <li><a href="terms-and-conditions.html">Terms and Conditions</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--end footer section-->

    <!--Start Scripts-->
    <script src="{{ asset('packages/houzez/js/jquery.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/moment.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('packages/houzez/js/custom.js') }}"></script>
</body>
</html>

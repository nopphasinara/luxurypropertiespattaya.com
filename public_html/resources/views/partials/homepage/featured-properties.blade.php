<!-- #featured-properties -->
<div id="featured-properties" class="bg-gray-100 gd-top-2d-gray-400 py-2x">
  <div class="container position-relative">
    <h2 class="h2x bold text-center mb-3 text-uppercase text-primary">Featured Properties</h2>
    <div class="row">
      <div class="col-12">
        <!-- #featured-slide -->
        <div id="featured-slide" class="carousel slide no-absolute" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            @for ($i = 0; $i < $featured_properties->count(); $i++)
              @php
                $property = $featured_properties[$i];
                $url = _url('/property-details/'. $property['id'] .'/' . str_slug($property['name'], '-'));
              @endphp
              <div class="carousel-item {!! $active = ($i == 0) ? 'active' : '' !!}">
                <div class="row">
                  <div class="col-lg">
                    <div class="box-shadow m-1 rounded-sm thumbnail position-relative">
                      <div class="bg-image rounded-sm">
                        <img src="https://img.thailandholidayhomes.com/cache/villa_1165_23219-550x366-1.jpg" width="100%" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg">
                    <div class="carousel-caption">
                      <h2 class="h3 bold mb-3 text-uppercase">
                        <a href="{{ $url }}">{!! $property['name'] !!}</a>
                      </h2>
                      <ul class="tagline list-inline">
                        <li class="list-inline-item">
                          <i class="fa fa-lg fa-fw fa-map-marker"></i> <a class="text-uppercase" href="{{ _url('/properties-in-' . $property->location->slug) }}">{!! $property->location->name !!}</a>
                        </li>
                        <li class="list-inline-item">
                          <i class="fa fa-fw fa-lg fa-home"></i> <a class="text-uppercase" href="{{ _url('/search') }}">{!! $property->category->name !!}</a>
                        </li>
                      </ul>
                      <div class="line-1 my-2"></div>
                      <p class="lead mb-1">
                        This is a house that dreams really are made off! Located in a tranquil and beautiful part of Naklua, overlooking the Gulf of Thailand, this is a must view property!
                      </p>
                      <p class="lead mb-3">
                        <a class="bold" href="{{ $url }}">Read More &raquo;</a>
                      </p>
                      <div class="row">
                        <div class="col-md mb-1">
                          <div class="lead text-center badge-primary px-2 py-1 rounded bold">
                            Sale ฿19,000,000
                          </div>
                        </div>
                          <div class="col-md mb-1">
                          <div class="lead text-center badge-secondary px-2 py-1 rounded bold">
                            Rent ฿19,000/month
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endfor
          </div>
          <ol class="carousel-indicators mt-3">
            @for ($i = 0; $i < $featured_properties->count(); $i++)
              <li data-target="#featured-slide" data-slide-to="{{ $i }}" class="{{ $active = ($i == 0) ? 'active' : '' }}"></li>
            @endfor
          </ol>
        </div>
        <!-- /#featured-slide -->
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /#featured-properties -->

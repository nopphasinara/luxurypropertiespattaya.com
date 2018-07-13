<!-- #featured-properties-ads -->
<div id="featured-properties-ads" class="mt-6">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg mb-4 mb-lg-0">

        <div id="featured-properties-ads-slide" class="carousel slide bg-gray-600 rounded-sm" data-ride="carousel">
          @if ($featuredProperties->count())
              @php($total_slides = $featuredProperties->count())
              <ol class="carousel-indicators indicator-bar d-none">
                @php($active = 'active')
                @for ($i = 0; $i < $total_slides; $i++)
                  <li data-target="#featured-properties-ads-slide" data-slide-to="{{ $i }}" class="{{ $active }}"></li>
                  @php($active = '')
                @endfor
              </ol>
              <div class="carousel-inner">
                @php($active = 'active')
                @foreach ($featuredProperties as $key => $property)
                  <div class="carousel-item {{ $active }}">
                    <a href="{{ $property->permalink }}">
                      <div class="bg-wrapper h-400px">
                        <div class="bg-image bg-gray-600 rounded-sm">
                          <img src="{{ $property->thumbnail }}" alt="{{ $property->name }}">
                        </div>
                      </div>
                    </a>
                    <div class="bg-overlay bottom-0 left-auto right-0 w-50 px-4 py-3">
                      <div class="bg-overlay bg-white fade-80"></div>
                      <div class="position-relative">
                        <h2 class="h5 bold">
                          <a href="{{ $property->permalink }}">{{ $property->name }}</a>
                        </h2>
                        @if ($property->refno)
                          <p>
                            <span class="text-6 badge badge-info">{{ $property->refno }}</span>
                          </p>
                        @endif
                        @if ($property->description)
                          {!! str_limit($property->description, 100, '...') !!}
                        @endif
                      </div>
                    </div>
                    <div class="bg-overlay w-auto h-auto bg-success text-white bold lead rounded-right-sm left-0 top-10px px-10px py-5px">Featured</div>
                    <a class="position-absolute bottom-0 text-5 btn btn-block btn-primary bold text-uppercase rounded-top-0" href="{{ $property->permalink }}">View Property</a>
                  </div>
                  @php($active = '')
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#featured-properties-ads-slide" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#featured-properties-ads-slide" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          @else
            <div class="h-400px">&nbsp;</div>
          @endif
        </div><!-- /#featured-properties-ads-slide -->

      </div>
      <div class="col-12 col-lg-auto">
        <!-- .widget-advertises -->
        <div class="widget-advertises border border-gray-400">
          @if ($featuredAds && $featuredAds->count())
            @if (!$featuredAds->permalink || $featuredAds->permalink == '#')
              <img class="img-fluid" src="{{ $featuredAds->thumbnail }}" alt="{{ $featuredAds->name }}">
            @else
              <a href="{{ $featuredAds->permalink }}" target="_blank" rel="nofollow,noindex">
                <img class="img-fluid" src="{{ $featuredAds->thumbnail }}" alt="{{ $featuredAds->name }}">
              </a>
            @endif
          @endif
        </div>
        <!-- /.widget-advertises -->
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /#featured-properties-ads -->

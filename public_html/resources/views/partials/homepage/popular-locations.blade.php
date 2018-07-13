<!-- #popular-locations -->
<div id="popular-locations" class="bg-white pt-2x pb-1x">
  <div class="container">
    @if ($locations->count())
      <h2 class="h2x bold mb-5 text-center text-uppercase text-primary">Browse By Popular Location</h2>
      <div class="row">
        @foreach ($locations as $index => $location)
          <div class="card-deck col-12 col-md-6 col-lg-4 w-100 mb-4 mx-auto">
            <div class="card mx-0">
              <div class="card-body p-0">
                <div class="bg-wrapper rounded-sm h-340px mb-3 box-shadow">
                  <a href="{{ url('properties-in-' . $location->slug) }}">
                    <div class="bg-image">
                      <img src="{{ $location->thumbnail }}" width="100%" alt="{{ $location->name }}">
                    </div>
                  </a>
                </div>
                <h3 class="h4 bold text-uppercase pl-1">
                  <a href="{{ url('properties-in-' . $location->slug) }}"><i class="fa fa-lg fa-fw fa-map-marker text-secondary"></i> {{ $location->name }}</a>
                </h3>
                <div class="card-description px-2">
                  {!! $location->description !!}
                </div>
              </div>
              <div class="card-footer bg-white border-top-0 rounded-bottom">
                <a href="{{ url('properties-in-' . $location->slug) }}" class="btn text-5 bold text-uppercase btn-block btn-primary">Browse Properties &raquo;</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
    {{-- <h2 class="h2x bold mb-5 text-center text-uppercase text-primary">Browse By Popular Location</h2>
    <div class="row">
      @if ($locations->count())
        @foreach ($locations as $key => $location)
          <div class="card-deck col-12 col-md-6 col-lg-4 w-100 mb-4 mx-auto">
            <div class="card mx-0">
              <div class="card-body p-0">
                <div class="bg-wrapper rounded-sm h-340px mb-3 box-shadow">
                  <a href="{{ _url($location->page_url) }}">
                    <div class="bg-image">
                      <img src="{{ asset($location->image) }}" width="100%" alt="{{ $location['name'] }}">
                    </div>
                  </a>
                </div>
                <h3 class="h4 bold text-uppercase pl-1">
                  <a href="{!! _url($location->page_url) !!}"><i class="fa fa-lg fa-fw fa-map-marker text-secondary"></i> {{ $location['name'] }}</a>
                </h3>
                <div class="card-description px-2">
                  {!! $location['description'] !!}
                </div>
              </div>
              <div class="card-footer bg-white border-top-0 rounded-bottom">
                <a href="{!! _url($location->page_url) !!}" class="btn text-5 bold text-uppercase btn-block btn-primary">Browse Properties &raquo;</a>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div> --}}
  </div><!-- /.container -->
</div>
<!-- /#popular-locations -->

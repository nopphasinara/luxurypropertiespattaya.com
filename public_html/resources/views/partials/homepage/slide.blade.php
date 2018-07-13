<div id="homepage-slide" class="carousel slide bg-1d-gray-900" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="position-relative carousel-item active">
      <div class="bg-image">
        <img class="fade-50" src="{{ asset(config('custom.homepage_form_bg')) }}" width="100%" alt='{{ config('custom.tagline') }}'>
      </div>
      <div class="carousel-caption text-center">
        <h3 class="h2x bold mb-2 pinyon text-white">{{ config('custom.tagline') }}</h3>
        <h1 class="text-white">
          <p class="lead">Search luxury properties for <span class="bold">SALE</span> and <span class="bold">RENT</span>.</p>
        </h1>
        <div class="box-form bg-white rounded px-2 py-2 mb-1">
          <form action="{{ route('search') }}" method="get">
            <div class="form-row align-items-center">
              <div class="d-none d-lg-block col-12 col-lg-auto">
                <i class="fa fa-fw fa-2x fa-search text-secondary"></i>
              </div>
              <div class="col-12 col-lg pb-1 pb-lg-0">
                <input class="form-control" type="text" name="s" placeholder="Search by Property Name or Property ID" />
              </div>
              <div class="col-12 col-lg-auto">
                <button class="btn btn-block btn-success bold text-uppercase" type="submit">Search</button>
              </div>
            </div>
          </form>
        </div>
        @if (isset($searchTags) && $searchTags)
          <div class="lead d-block d-md-inline mb-1">
            Trending search:
          </div>
          <div class="d-block d-md-inline">
            @foreach ($searchTags as $index => $tag)
              <a class="box-shadow p-1 badge badge-primary mb-1" href="{{ route('search') . '?s='. $tag .'' }}">{{ $tag }}</a>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</div>

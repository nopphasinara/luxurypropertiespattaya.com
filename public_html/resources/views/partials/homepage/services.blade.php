<!-- #services -->
<div id="services" class="position-relative bg-gray-400 pt-1x pb-1x pb-lg-4x">
  <div class="bg-image fade-80">
    <img class="mt-lg-3x" src="{{ asset(config('custom.homepage_services_bg')) }}" alt="Making Dreams Come True">
  </div>
  <div class="container position-relative">
    <h2 class="h2x text-center text-blue bold pinyon mb-0">&quot;Making Dreams Come True&quot;</h2>
    <div class="row">
      @foreach (site('services') as $key => $service)
        <div class="card-deck col-lg-4 w-100 mb-md-3 mx-auto">
          <div class="card mx-0">
            <div class="card-body text-center">
              <div class="card-title mb-0">
                <div class="card-icon mb-2 mx-auto">
                  {!! $service['icon'] !!}
                </div>
                <h3 class="h5 text-primary bold">{{ $service['title'] }}</h3>
              </div>
              <div class="card-subtitle">
                <h3 class="h5 text-primary bold">{{ $service['subtitle'] }}</h3>
              </div>
              <div class="card-description">
                {{ $service['description'] }}
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div><!-- /.container -->
</div>
<!-- /#services -->

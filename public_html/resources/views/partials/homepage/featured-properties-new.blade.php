<!-- #featured-properties-new -->
<div id="featured-properties-new" class="pt-2 pb-2 bg-primary">
  <div class="container position-relative">
    <h2 class="h2x bold text-center mb-0 text-uppercase text-white">Featured Properties</h2>
  </div><!-- /.container -->
</div>
<!-- /#featured-properties-new -->

<!-- #featured-slide-new -->
<div id="featured-slide-new" class="bg-white carousel slide" data-ride="carousel">
  @if ($featuredProperties->count())
    <div class="carousel-inner" role="listbox">
      @php($active = 'active')
      @foreach ($featuredProperties as $key => $property)
        <div class="h-620px carousel-item {{ $active }}">
          <div class="bg-image">
            <img src="{{ $property->thumbnail }}" alt="{{ $property->name }}">
          </div>
          <div class="carousel-caption">
            <div class="row">
              <div class="col-12 col-md-7 col-lg-6 col-xl-5 bg-indigo px-3 pt-3 pb-2 rounded-top-sm">
                <h2 class="title bold text-uppercase">
                  <a href="{{ $property->permalink }}" title="{{ $property->name }}">
                    {{ $property->name }}
                  </a>
                </h2>
                <div class="d-none d-md-block description mb-3">
                  @if ($property->refno)
                    <p>
                      <span class="text-6 badge badge-info">Ref No: {{ $property->refno }}</span>
                    </p>
                  @endif
                  
                  {!! str_limit(trim(strip_tags($property->description)), 500, '...') !!}
                </div>
                <div class="row">
                  @if ($property->for_sale && $property->sale_price)
                    <div class="col-12">
                      <div class="lead text-center badge-primary px-2 py-1 rounded bold mb-2">
                        Sale ฿{{ $property->sale_price }}
                      </div>
                    </div>
                  @endif
                  @if ($property->for_rent && $property->rent_price)
                    <div class="col-12">
                      <div class="lead text-center badge-secondary px-2 py-1 rounded bold mb-2">
                        Rent ฿{{ $property->rent_price }}/month
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-7 col-lg-6 col-xl-5 bg-2l-indigo p-0 rounded-bottom-sm">
                <a href="{{ $property->permalink }}" class="py-2 btn border-0 text-2l-gold btn-sm btn-block bold text-uppercase">View Now</a>
              </div>
            </div>
          </div>
        </div>
        @php($active = '')
      @endforeach
    </div>
    <ol class="carousel-indicators mt-3">
      @php($active = 'active')
      @for ($i = 0; $i < $featuredProperties->count(); $i++)
        <li data-target="#featured-slide-new" data-slide-to="{{ $i }}" class="{{ $active }}"></li>
        @php($active = '')
      @endfor
    </ol>
  @else
    <p class="lead w-100 text-center">No results found.</p>
  @endif
</div>
<!-- /#featured-slide-new -->

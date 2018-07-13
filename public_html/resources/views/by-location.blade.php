@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.search-toolbar', [])
  @endcomponent

  @component('components.featured-properties', [])
  @endcomponent

  @component('components.page-title')
    @slot('title', $location . ' Properties For ' . $for)
    {{-- @slot('subtitle', '') --}}

    <div class="container">
      <ul class="list-inline">
        <li class="list-inline-item">Sort by:</li>
        <li class="list-inline-item"><span class="bold">Relevance</span></li>
        <li class="list-inline-item">
          <a class="bold" href="">Price High to Low</a>
        </li>
        <li class="list-inline-item">
          <a class="bold" href="">Price Low to High</a>
        </li>
        <li class="list-inline-item">
          <a class="bold" href="">More <i class="fa fa-fw fa-caret-down"></i></a>
        </li>
      </ul>
    </div><!-- /.container -->
  @endcomponent

  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- #search-results -->
        <div id="search-results" class="">
          <div class="row">
              @if ($properties->count() > 0)
                @foreach ($properties as $key => $property)
                  <div class="card col-12 col-md-4 mb-2x">
                    <div class="card-body p-0">
                      <div class="thumbnail mb-2 rounded-sm">
                        <a href="#">
                          <div class="bg-wrapper h-250px">
                            <div class="bg-image">
                              <img src="http://placehold.it/100px180" width="100%" alt="...">
                            </div>
                            <div class="bg-overlay">
                              <div class="position-relative top-10 left-10">
                                @if ($property->featured == 1)
                                  <span class="text-6 badge badge-success">Featured</span>
                                @endif
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="description">
                        <h3 class="card-title">
                          <a href="{{ _url($property->url) }}">
                            {!! $property->name !!}
                          </a>
                        </h3>

                        @if ($property->description)
                          <p class="card-text mb-3">
                            {!! str_limit($property->description, 80, '...') !!}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="card-footer text-muted d-none"></div>
                    <a class="btn-sm btn btn-block btn-primary text-uppercase bold" href="/property-details/123456/property-title">View Property</a>
                  </div>
                @endforeach
              @else
                <p class="lead w-100 text-center">No results found.</p>
              @endif
          </div>
        </div>
        <!-- /#search-results -->
      </div>
    </div>

    @if ($properties)
      {!! $properties->appends(['sort' => 'name'])->links() !!}
    @endif
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

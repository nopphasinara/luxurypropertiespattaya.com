@extends('layouts.main')

@if ($randomKeywords)
  @section('meta_description', 'You\'ve searched for '. $keywords .'! '. config('custom.site_name') .' has '. $properties->total() .' of unique options to choose from, like '. $randomKeywords .'.')
@else
  @section('meta_description', 'You\'ve searched for our properties! '. config('custom.site_name') .' has '. $properties->total() .' of unique options to choose from, like '. $randomKeywords .'.')
@endif

@if (isset($keywords) && $keywords)
  @section('meta_title', 'Searched for '. $keywords .' properties - '. config('custom.site_name') .'')
@else
  @section('meta_title', 'All Properties - '. config('custom.site_name') .'')
@endif

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.search-toolbar', [])
  @endcomponent

  @component('components.featured-properties', [])
  @endcomponent

  @component('components.page-title')
    @slot('title', 'Search Property')
    {{-- @slot('subtitle', '') --}}

    <div class="container">
      <ul class="list-inline">
        <li class="list-inline-item">Sort by:</li>
        <li class="list-inline-item">
          <a class="bold" href="{{ request_query('url', ['order' => 'created_at', 'sort' => 'desc']) }}">
            <span class="bold">Relevance</span>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="bold" href="{{ request_query('url', ['order' => 'price', 'sort' => 'desc']) }}">Price High to Low</a>
        </li>
        <li class="list-inline-item">
          <a class="bold" href="{{ request_query('url', ['order' => 'price', 'sort' => 'asc']) }}">Price Low to High</a>
        </li>
        {{-- <li class="list-inline-item">
          <a class="bold" href="">More <i class="fa fa-fw fa-caret-down"></i></a>
        </li> --}}
      </ul>
    </div><!-- /.container -->
  @endcomponent

  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- #search-results -->
        <div id="search-results" class="">
          @if ($properties && $properties->count())
            <div class="row">
              @foreach ($properties as $key => $property)
                <div class="card col-12 col-md-4 mb-2x">
                  <div class="card-body p-0">
                    <div class="thumbnail mb-2 rounded-sm">
                      <a href="{{ $property->permalink }}">
                        <div class="bg-wrapper h-250px">
                          <div class="bg-image">
                            <img src="{{ $property->thumbnail }}" width="100%" alt="{{ $property->name }}">
                          </div>
                          <div class="bg-overlay">
                            <div class="d-flex flex-row justify-content-between">
                              @if ($property->featured == 1)
                                <div class="position-relative top-10 left-10">
                                  <span class="text-6 badge badge-success">Featured</span>
                                </div>
                              @endif
                              @if ($property->refno)
                                <div class="position-relative top-10 right-10">
                                  <span class="text-6 badge badge-info">{{ $property->refno }}</span>
                                </div>
                              @endif
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="description">
                      <h3 class="card-title">
                        <a href="{{ $property->permalink }}">
                          {{ $property->name }}
                        </a>
                      </h3>

                      @if ($property->description)
                        <p class="card-text mb-3">
                          {!! str_limit($property->description, 100, '...') !!}
                        </p>
                      @endif
                    </div>
                  </div>
                  <div class="card-footer text-muted d-none"></div>
                  <a class="btn-sm btn btn-block btn-primary text-uppercase bold" href="{{ $property->permalink }}">View Property</a>
                </div>
              @endforeach
            </div>
          @else
            <div class="row mb-4">
              <div class="col-12">
                <p class="lead">No result found.</p>
              </div>
            </div>
          @endif
        </div>
        <!-- /#search-results -->
      </div>
    </div>

    <!-- #pagination -->
    {{ $properties->appends($searchQuery)->links() }}
    <!-- /#pagination -->
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

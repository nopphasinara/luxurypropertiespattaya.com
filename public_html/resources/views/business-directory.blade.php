@extends('layouts.main')

@if (isset($businessCategory))
  @section('meta_description', 'Business directory by category '. $businessCategory->name .' page '. request('page', '1') .'')
@else
  @section('meta_description', 'Business directory page '. request('page', '1') .'')
@endif

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @if (isset($businessCategory))
      @slot('title', $businessCategory->name)
    @else
      @slot('title', 'Business Directory')
    @endif
    {{-- @slot('subtitle', '') --}}
  @endcomponent

  <div class="container">
    <div class="row pb-2x">
      <div class="col-12 col-lg-8">
        <div class="row">
          @if ($businessListings && $businessListings->count())
            @foreach ($businessListings as $index => $businessListing)
              <div class="col-12 mb-6">
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="thumbnail mb-2 mb-md-0 rounded-sm">
                      @if ($businessListing->website)
                        <a href="{{ $businessListing->website }}" target="_blank" rel="nofollow,noindex">
                          <img src="{{ $businessListing->thumbnail }}" width="100%" alt="{{ $businessListing->name }}">
                        </a>
                      @else
                        <img src="{{ $businessListing->thumbnail }}" width="100%" alt="{{ $businessListing->name }}">
                      @endif
                    </div>
                  </div>
                  <div class="col-12 col-sm-8">
                    @if ($businessListing->website)
                      <h4 class="bold">
                        <a href="{{ $businessListing->website }}" target="_blank" rel="nofollow,noindex">{{ $businessListing->name }}</a>
                      </h4>
                    @else
                      <h4 class="bold text-primary">{{ $businessListing->name }}</h4>
                    @endif
                    <p class="lead">{{ $businessListing->address }}</p>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <i class="fa fa-fw fa-bookmark"></i> <a href="{{ $businessListing->category()->permalink }}">{{ $businessListing->category()->name }}</a>
                      </li>
                      <li class="list-inline-item">
                        <i class="fas fa-fw fa-phone"></i> <a href="#">{{ $businessListing->phone }}</a>
                      </li>
                      <li class="list-inline-item">
                        <i class="fas fa-fw fa-envelope"></i> <a href="#">{{ $businessListing->email }}</a>
                      </li>
                    </ul>
                    <div class="description mb-2">
                      {{ $businessListing->description }}
                    </div>
                    <a class="bold text-uppercase" href="{{ $businessListing->website }}" target="_blank" rel="nofollow,noindex">
                      {{ $businessListing->website }} <i class="fas fa-fw fa-external-link-alt"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="col-12">
              <p class="lead">No results</p>
            </div>
          @endif
        </div>

        <!-- #pagination -->
        {!! $businessListings->appends(['sort' => 'name'])->links() !!}
        <!-- /#pagination -->
      </div>
      <div class="col-12 col-lg-4">
        @include('components.business-ads', ['featured' => true])
        @include('components.business-add')
        @include('components.business-ads', ['featured' => false])
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

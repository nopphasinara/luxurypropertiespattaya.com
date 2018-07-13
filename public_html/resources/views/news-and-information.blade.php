@extends('layouts.main')

@if (isset($newsCategory) && $newsCategory)
  @section('meta_description', 'News and Information by category '. $newsCategory->name .' page '. request('page', '1') .'')
@else
  @section('meta_description', 'News and Information page '. request('page', '1') .'')
@endif

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @if ($newsCategory)
      @slot('title', $newsCategory->name . ' News')
    @else
      @slot('title', 'News and Information')
    @endif
    {{-- @slot('subtitle', '') --}}
  @endcomponent

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        @if ($featuredNews)
          <div class="row">
            <div class="col-12">
              <div id="featured-news">
                <div class="box-thumbnail mb-2">
                  <a href="{{ $featuredNews->permalink }}">
                    <div class="bg-wrapper h-400px bg-gray-600 rounded-sm">
                      <div class="bg-image bg-gray-600 rounded-sm">
                        <img class="top-50 bottom-0" src="{{ $featuredNews->thumbnail }}" alt="{{ $featuredNews->name }}">
                      </div>
                    </div>
                  </a>
                </div><!-- /.box-thumbnail -->
                <div class="box-details">
                  <h2 class="bold"><a href="{{ $featuredNews->permalink }}">{{ $featuredNews->name }}</a></h2>
                  <ul class="list-inline">
                    @if ($featuredNews->category())
                      <li class="list-inline-item">
                        <i class="fa fa-fw fa-bookmark"></i> <a href="{{ $featuredNews->category()->permalink }}">{{ $featuredNews->category()->name }}</a>
                      </li>
                    @endif
                    <li class="list-inline-item">
                      <i class="fa fa-fw fa-calendar-alt"></i> {{ $featuredNews->created_at }}
                    </li>
                  </ul>
                  @if ($featuredNews->description)
                    <div class="box-description mb-2">
                      {!! str_limit(strip_tags($featuredNews->description), 150, '...') !!}
                    </div>
                  @endif
                  <a class="bold text-uppercase" href="{{ $featuredNews->permalink }}">Read More &raquo;</a>
                </div><!-- /.box-details -->
              </div>
            </div>
          </div>
          <div class="line-1 mt-4 mb-6"></div>
        @endif
        
        <div class="row mb-4">
          @if ($news)
            @foreach ($news as $index => $data)
              <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-6">
                <div class="row">
                  <div class="col-12">
                    <div class="thumbnail mb-2">
                      <a href="{{ $data->permalink }}">
                        <div class="bg-wrapper h-200px">
                          <div class="bg-image bg-gray-600 rounded-sm">
                            <img class="top-50 bottom-0" src="{{ $data->thumbnail }}" width="100%" alt="{{ $data->name }}">
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <h2 class="h3 bold"><a href="{{ $data->permalink }}">{{ $data->name }}</a></h2>
                    <ul class="list-inline">
                      @if ($data->category())
                        <li class="list-inline-item">
                          <i class="fa fa-fw fa-bookmark"></i> <a href="{{ $data->category()->permalink }}">{{ $data->category()->name }}</a>
                        </li>
                      @endif
                      <li class="list-inline-item">
                        <i class="fa fa-fw fa-calendar-alt"></i> {{ $data->created_date }}
                      </li>
                    </ul>
                    @if ($data->description)
                      <div class="box-description mb-2">
                        {{ strip_tags(str_limit($data->description, 150, '...')) }}
                      </div>
                    @endif
                    <a class="bold text-uppercase" href="{{ $data->permalink }}">Read More &raquo;</a>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            @if (!$featuredNews)
              <div class="col-12">
                <p class="lead">No results</p>
              </div>
            @endif
          @endif
        </div>

        
        <!-- #pagination -->
        @if ($news)
          {!! $news->links() !!}
        @endif
        <!-- /#pagination -->
      </div>
      <div class="col-12 col-lg-4">
        @include('components.news-categories')
        @include('components.recent-news')
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

@extends('layouts.main')

@section('meta_title', $news->name)
@section('meta_description', str_limit(preg_replace("/\r\n/i", "", strip_tags($news->description)), 150, '...'))
{{-- @section('meta_keywords', $news->keywords) --}}
@section('meta_image', $news->thumbnail)
@section('meta_type', 'article')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', $news->name)
    {{-- @slot('subtitle', '') --}}
  @endcomponent

  <div class="container">
    <div class="row pb-2x">
      <div class="col-12 col-lg-8">
        <div class="bg-wrapper h-420px mb-3">
          <div class="bg-image rounded-sm bg-gray-600">
            <img src="{{ $news->thumbnail }}" alt="{{ $news->name }}">
          </div>
        </div>
        <div class="row justify-content-between bg-gray-400 m-0 mb-4 p-2 rounded-sm">
          <div class="col-auto align-middle">
            <ul class="list-inline mb-0">
              @if ($news->category())
                <li class="list-inline-item">
                  <i class="fa fa-fw fa-bookmark"></i> <a href="{{ $news->category()->permalink }}">{{ $news->category()->name }}</a>
                </li>
              @endif
              <li class="list-inline-item">
                <i class="fa fa-fw fa-calendar-alt"></i> {{ $news->created_date }}
              </li>
            </ul>
          </div>
          <div class="col-auto align-middle">
            <ul class="list-inline mb-0 mt-1 mt-sm-0">
              <li class="list-inline-item align-middle">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}&amp;src=sdkpreparse" target="_blank" rel="nofollow,noindex">
                  <i class="fab fa-2x fa-facebook-square text-facebook" aria-hidden></i>
                </a>
              </li>
              <li class="list-inline-item align-middle">
                <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ $news->name }}&amp;url={{ request()->fullUrl() }}&amp;in-reply-to={{ config('custom.twitter_reply_to') }}" target="_blank" rel="nofollow,noindex">
                  <i class="fab fa-2x fa-twitter-square text-twitter" aria-hidden></i>
                </a>
              </li>
              <li class="list-inline-item align-middle">
                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ request()->fullUrl() }}&amp;title={{ $news->name }}&amp;summary={{ strip_tags($news->description) }}&amp;source={{ config('custom.linkedin_source') }}" target="_blank" rel="nofollow,noindex">
                  <i class="fab fa-2x fa-linkedin text-linkedin" aria-hidden></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        {!! $news->content !!}
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

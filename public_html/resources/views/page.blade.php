@extends('layouts.main')

@section('meta_title', $page->name . ' - ' . config('custom.site_name'))
@section('meta_description', $page->description)

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', $page->name)
    @slot('subtitle', $page->tagline)
  @endcomponent

  <div class="container">
    {!! $page->content !!}

    @if (in_array($page->slug, ['contact-us', 'contact-us-new']))
      @include('partials.forms.contact-us')
    @endif

    <p class="h-50px">&nbsp;</p>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

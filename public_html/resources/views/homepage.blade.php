@extends('layouts.main')
@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @include('partials.homepage.slide')
  @include('partials.homepage.featured-properties-new')
  {{-- @include('partials.homepage.featured-properties') --}}
  @include('partials.homepage.popular-locations')
  @include('partials.homepage.services')
  @include('partials.homepage.clients')
@endsection

@section('footer')
  @include('partials.footer.contact-info')
  {{-- @include('partials.footer.call-to-action') --}}
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

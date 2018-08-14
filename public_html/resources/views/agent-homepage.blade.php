@extends('layouts.main-agent')

@section('content')
  @include('partials.modules.agent-media')

  <section id="section-body">

    @include('partials.modules.agent-latest-for-sale')
    @include('partials.modules.agent-latest-for-rent')
    @include('partials.modules.agent-featured-listings')

  </section>
@endsection

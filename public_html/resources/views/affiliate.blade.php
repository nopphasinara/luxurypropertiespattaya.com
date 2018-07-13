@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('meta_description', 'Unique Property For Sale & For Rent at Affordable Prices throughout Pattaya and surrounding areas')

@section('content')
  @component('components.page-title')
    @slot('title', 'About Us & Our Company')
    @slot('subtitle', 'Why You Should Buy Through Our Website')
  @endcomponent

  <div class="container">
    @if (auth()->user())
      @forelse(auth()->user()->getReferrals() as $referral)
        <h4>
          {{ $referral->program->name }}
        </h4>
        <code>
          {{ $referral->link }}
        </code>
        <p>
          Number of referred users: {{ $referral->relationships()->count() }}
        </p>
      @empty
        No referrals
      @endforelse
    @endif

    {{ cookie('aid') }}
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

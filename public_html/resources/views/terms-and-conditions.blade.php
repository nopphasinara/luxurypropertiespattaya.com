@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', 'Terms and Conditions')
    @slot('subtitle', 'Guest Terms and Conditions')
  @endcomponent

  <div class="container">
    <div class="row pb-6">
      <div class="col">
        <ul class="list-unstyled">
          @for ($i = 0; $i < 10; $i++)
            <li class="mb-4">
              <h4 class="bold mb-1">{{ ($i + 1) }}. Lorem ipsum dolor sit amet</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </li>
          @endfor
        </ul>
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

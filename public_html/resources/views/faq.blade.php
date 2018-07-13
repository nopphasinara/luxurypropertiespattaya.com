@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', 'Frequently Asked Questions')
    @slot('subtitle', 'To Help you Understand us Better!')
  @endcomponent

  <div class="container">
    <div class="row pb-2x">
      <div class="col-12">
        <ul class="list-unstyled mb-6">
          @for ($i = 0; $i < 10; $i++)
            <li class="mb-4">
              <p class="lead bold text-primary mb-1">Q. Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
              <p><span class="bold">A.</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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

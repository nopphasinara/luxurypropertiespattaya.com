@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', 'Our Services')
    @slot('subtitle', 'Subtitle of a longer services')
  @endcomponent

  <div class="container">
    <div class="row pb-6">
      <div class="col-lg mb-3 mb-md-0">
        <h2 class="bold">New feature</h2>
        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

        <ul>
          <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
          <li>Donec id elit non mi porta gravida at eget metus.</li>
          <li>Nulla vitae elit libero, a pharetra augue.</li>
        </ul>

        <p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>

        <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
      </div>
      <div class="col-lg">
        <div class="bg-wrapper h-320px">
          <div class="bg-image rounded">
            <img src="http://placehold.it/100px320" width="100%" alt="">
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-4">
      @foreach (site('services') as $key => $service)
        <div class="card-deck col-lg-4 w-100 mb-3 mx-auto">
          <div class="card mx-0">
            <div class="card-body bg-gray-200 text-center rounded box-shadow">
              <div class="card-title mb-0">
                <p class="text-center text-3d-gray">{!! $service['icon'] !!}</p>
                <h3 class="h4 bold text-3d-gray">{{ $service['title'] }}</h3>
              </div>
              <div class="card-subtitle">
                <h3 class="h4 bold text-3d-gray">{{ $service['subtitle'] }}</h3>
              </div>
              <div class="card-description text-2d-gray">
                {{ $service['description'] }}
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row mb-6">
      <div class="col">
        <h2 class="bold">Another services</h2>
        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>

        <p>Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

        <p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>

        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

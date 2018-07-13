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
    <p class="display-4 my-0 mb-4 text-primary text-center">
      Unique Property For Sale & For Rent at Affordable Prices throughout Pattaya.
    </p>

    <div class="row mb-6">
      <div class="col-lg mb-3">
        <div class="bg-wrapper h-320px">
          <div class="bg-image rounded">
            <img src="http://placehold.it/100px320" width="100%" alt="">
          </div>
        </div>
      </div>
      <div class="col-lg">
        <h2>{{ site('company_name') }}</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
      </div>
    </div>


    <h2 class="bold text-uppercase mb-3">Team</h2>
    <div class="row mb-4">
      @for ($i = 1; $i <= 4; $i++)
        <div class="col-lg-3 mb-4">
          <div class="card h-100 text-center">
            <div class="bg-wrapper h-180px">
              <div class="bg-image rounded">
                <img src="http://placehold.it/100px230" width="100%" alt="">
              </div>
            </div>
            <div class="card-body pb-0">
              <h5 class="card-title">Firstname Lastname</h4>
              <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            </div>
            <div class="card-footer border-0 py-0 my-0">
              <a href="#">name@example.com</a>
            </div>
          </div>
        </div>
      @endfor
    </div>

    <h2 class="bold text-uppercase mb-3">History</h2>
    <div class="row pb-2x">
      <div class="col">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
      </div>
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

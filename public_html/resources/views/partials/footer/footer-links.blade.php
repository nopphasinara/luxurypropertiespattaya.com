<!-- #footer-links -->
<div id="footer-links" class="position-relative bg-primary pt-6 pb-4">
  <div class="bg-image">
    <img class="fade-10" src="{{ asset('images/bg-jumbotron-small.jpg') }}" width="100%" alt='"Making Dreams Come True"'>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <h3 class="h5 bold text-gold text-uppercase mb-0">Properties For Sale</h3>
        <div class="line-1 mb-2 mt-2 bg-1d-primary"></div>
        <ul class="list-unstyled">
          <li>
            <a href="{{ _url('/') }}">East Side Pattaya Properties</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Golf Course Properties For Sale</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Jomtien Properties For Sale</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Naklua Properties For Sale</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Pattaya Properties For Sale</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Rayong Properties For Sale</a>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-3">
        <h3 class="h5 bold text-gold text-uppercase mb-0">Properties For Rent</h3>
        <div class="line-1 mb-2 mt-2 bg-1d-primary"></div>
        <ul class="list-unstyled">
          <li>
            <a href="{{ _url('/') }}">East Side Pattaya Properties</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Golf Course Properties For Rent</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Jomtien Properties For Rent</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Naklua Properties For Rent</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Pattaya Properties For Rent</a>
          </li>
          <li>
            <a href="{{ _url('/') }}">Rayong Properties For Rent</a>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-lg-3">
        <h3 class="h5 bold text-gold text-uppercase mb-0">Browse By Location</h3>
        <div class="line-1 mb-2 mt-2 bg-1d-primary"></div>
        <ul class="list-unstyled">
          @foreach (site('locations') as $key => $location)
            @if (stripos($location['title'], 'Golf') === false)
              <li>
                <a href="{{ _url('/') }}">Properties in {{ $location['title'] }}</a>
              </li>
            @else
              <li>
                <a href="{{ _url('/') }}">{{ $location['title'] }}</a>
              </li>
            @endif
          @endforeach
        </ul>
      </div>
      <div class="col-md-6 col-lg-3">
        <h3 class="h5 bold text-gold text-uppercase mb-0">Quick Links</h3>
        <div class="line-1 mb-2 mt-2 bg-1d-primary"></div>
        <ul class="list-unstyled">
          <li>
            <a href="{{ _url('/our-services') }}">Our Services</a>
          </li>
          <li>
            <a href="{{ _url('/faq') }}">FAQs</a>
          </li>
          <li>
            <a href="{{ _url('/about-us') }}">About Us</a>
          </li>
          <li>
            <a href="{{ _url('/contact-us') }}">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /#footer-links -->

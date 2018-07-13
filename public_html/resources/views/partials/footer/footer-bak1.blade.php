<!-- #footer -->
<div id="footer" class="bg-1d-primary text-2l-gold py-3">
  <div class="container">
    <div class="row justify-content-md-between">
      <div class="col-md">
        <div class="box-left text-center text-md-left">
          <p class="mb-0">
            &copy; Copyright 2018 {{ config('custom.site_name') }}.
          </p>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="{{ url('terms-and-conditions') }}">Terms and Conditions</a>
            </li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item">
              <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
            </li>
            <li class="list-inline-item">|</li>
            <li class="list-inline-item">
              <a href="{{ url('about-us') }}">About Us</a>
            </li>
          </ul>
        </div><!-- /.box-left -->
      </div>
      <div class="col-md-auto">
        <div class="box-right text-center text-md-left">
          <ul class="list-inline mb-0">
            <li class="list-inline-item bold text-uppercase d-block d-sm-inline-block mt-2 mt-md-0">
              Follow Us On
            </li>
            <li class="list-inline-item">
              <a href="{{ config('custom.facebook') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-lg fa-facebook"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="{{ config('custom.instagram') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-lg fa-instagram"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="{{ config('custom.youtube') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-lg fa-youtube"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="{{ config('custom.linkedin') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-lg fa-linkedin"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="{{ config('custom.twitter') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-lg fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="{{ config('custom.line') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-lg fa-line"></i></a>
            </li>
          </ul>
        </div><!-- /.box-right -->
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /#footer -->

<!-- #footer -->
<div id="footer" class="bg-1d-primary text-2l-gold">
  <div class="container">
    <div class="row justify-content-md-between">
      <div class="col-md pt-3 pb-2">
        <div class="box-left text-center text-md-left">
          @if ((int) config('custom.radio_banner_visible') === 1)
            <div class="follow-us">
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="{{ config('custom.facebook') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-fw fa-2x fa-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{ config('custom.instagram') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-fw fa-2x fa-instagram"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{ config('custom.youtube') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-fw fa-2x fa-youtube"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{ config('custom.linkedin') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-fw fa-2x fa-linkedin"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{ config('custom.twitter') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-fw fa-2x fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="{{ config('custom.line') }}" target="_blank" rel="nofollow,noindex"><i class="fab fa-fw fa-2x fa-line"></i></a>
                </li>
              </ul>
            </div><!-- / .follow-us -->
            <p class="mt-0 mt-md-2 mb-0 text-uppercase">
              &copy; Copyright 2018 {{ config('custom.site_name') }}.
            </p>
            <ul class="list-inline mb-0 text-uppercase bold">
              {!! $menuTree !!}
            </ul>
          @else
            <p class="mb-0 text-uppercase">
              &copy; Copyright 2018 {{ config('custom.site_name') }}.
            </p>
            <ul class="list-inline mb-0 text-uppercase bold">
              {!! $menuTree !!}
            </ul>
          @endif
        </div><!-- /.box-left -->
      </div>
      @if ((int) config('custom.radio_banner_visible') === 1)
        <div class="col-md-auto py-1">
          <div id="box-radio" class="box-right text-center text-md-left px-2 bg-white rounded-sm">
            <img src="{{ config('custom.radio_banner_white') }}" height="120" alt="Listen Live!">
            <div class="d-none">
              <audio data-radio-played="{{ $_COOKIE['is_radio_played'] or 0 }}" data-radio-url="{{ url('/radio-') }}" preload="none" style="width: 100%; height: 100%; background: transparent;" controls><source src="https://streams.radio.co/s102cd33bc/listen" type="audio/mpeg"></audio>
            </div>
            <div class="button-play-radio button button-on">Turn<br>On</div>
            <div class="button-play-radio button button-off d-none">Turn<br>Off</div>
          </div><!-- /.box-right -->
        </div>
      @else
        <div class="col-md-auto py-3">
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
          </div>
        </div>
      @endif
    </div>
  </div><!-- / .container -->
</div>
<!-- /#footer -->

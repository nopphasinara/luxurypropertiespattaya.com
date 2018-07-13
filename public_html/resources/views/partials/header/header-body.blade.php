<!-- #header-body -->
<div id="header-body" class="py-1 bg-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col">
        <a class="logo" href="{{ url('/') }}">
          <img src="{{ asset(config('custom.logo')) }}" width="100%" alt="{{ config('custom.site_name') }}">
        </a>
      </div>
      <div class="col-auto d-none d-lg-block">
        <ul class="list-unstyled mb-0">
          <li>
            <i class="fas fa-lg fa-fw fa-phone-volume"></i> <span class="lead bold text-uppercase text-primary">{{ config('custom.phone_number') }}</span>
          </li>
          <li>
            <i class="fas fa-lg fa-fw fa-envelope"></i> <a href="mailto:{{ config('custom.primary_email') }}">{{ config('custom.primary_email') }}</a>
          </li>
          <li>
            <i class="far fa-lg fa-fw fa-clock"></i> {{ config('custom.open_hours') }}
          </li>
        </ul>
      </div>
      <div class="col-auto d-none d-lg-block">
        <p class="bold mb-0">Follow Us At:</p>
        <ul class="list-inline mb-1">
          <li class="list-inline-item mx-0">
            <a href="{{ config('custom.facebook') }}" target="_blank" rel="noindex,nofollow">
              <span class="fa-stack text-black">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a href="{{ config('custom.instagram') }}" target="_blank" rel="noindex,nofollow">
              <span class="fa-stack text-black">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a href="{{ config('custom.youtube') }}" target="_blank" rel="noindex,nofollow">
              <span class="fa-stack text-black">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a href="{{ config('custom.linkedin') }}" target="_blank" rel="noindex,nofollow">
              <span class="fa-stack text-black">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a href="{{ config('custom.twitter') }}" target="_blank" rel="noindex,nofollow">
              <span class="fa-stack text-black">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item mx-0">
            <a href="{{ config('custom.line') }}" target="_blank" rel="noindex,nofollow">
              <span class="fa-stack text-black">
                <i class="fas fa-square fa-stack-2x"></i>
                <i class="fab fa-line fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        
        <div id="google_translate_element"></div>
        <script>
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'de,es,fr,ja,ko,ru,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true, gaTrack: true, gaId: 'UA-119608555-1'}, 'google_translate_element');
        }
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      </div>
      <div class="col-auto d-block d-lg-none">
        <button class="btn-toggler d-block d-lg-none btn btn-default p-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-3x fa-bars"></i>
        </button>
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /#header-body -->

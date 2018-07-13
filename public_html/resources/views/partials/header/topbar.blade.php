<!-- #topbar -->
<div id="topbar" class="d-none d-sm-block d-lg-none py-1 bg-light">
  <div class="container">
    <div class="row">
      <div class="col">
        <i class="align-middle fas fa-fw fa-2x fa-phone-square"></i> <span class="lead text-uppercase bold text-primary"><span class="d-none d-sm-inline">Call Us</span> {{ config('custom.phone_number') }}</span>
      </div>
      <div class="col-auto">
        <a class="align-middle" href="mailto:{{ config('custom.primary_email') }}">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fas fa-envelope fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
        <a class="align-middle" href="{{ config('custom.facebook') }}" target="_blank" rel="nofollow,noindex">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fab fa-facebook fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
        <a class="align-middle" href="{{ config('custom.instagram') }}" target="_blank" rel="nofollow,noindex">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fab fa-instagram fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
        <a class="align-middle" href="{{ config('custom.youtube') }}" target="_blank" rel="nofollow,noindex">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fab fa-youtube fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
        <a class="align-middle" href="{{ config('custom.linkedin') }}" target="_blank" rel="nofollow,noindex">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fab fa-linkedin fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
        <a class="align-middle" href="{{ config('custom.twitter') }}" target="_blank" rel="nofollow,noindex">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fab fa-twitter fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
        <a class="align-middle" href="{{ config('custom.line') }}" target="_blank" rel="nofollow,noindex">
          <span class="fa-stack text-black">
            <i class="fas fa-square fa-fw fa-stack-2x"></i>
            <i class="fab fa-line fa-fw fa-stack-1x fa-inverse"></i>
          </span>
        </a>
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /#topbar -->

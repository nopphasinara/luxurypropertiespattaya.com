@push('body.after')
  <script src="{{ asset('packages/houzez/js/custom.js') }}" crossorigin="anonymous"></script>
@endpush

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="{{ config('custom.company_name') }}">

  <title>{{ $user->name }} Affiliate Agent - {{ config('custom.company_name') }}</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" crossorigin="anonymous">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" crossorigin="anonymous">

  {{-- <link rel="stylesheet" href="{{ asset('packages/houzez/css/font-awesome.css') }}" crossorigin="anonymous" /> --}}
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/bootstrap.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/bootstrap-select.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/bootstrap-datetimepicker.min.css') }}" crossorigin="anonymous" />
  {{-- <link rel="stylesheet" href="{{ asset('packages/houzez/css/jquery-ui.css') }}" crossorigin="anonymous" /> --}}
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/slick.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/slick-theme.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/prettyPhoto.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/owl.carousel.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/styles.css') }}" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('packages/houzez/css/custom.css') }}" crossorigin="anonymous" />

  @stack('head.after')
</head>
<body>
  {{-- <div id="body__stacks"></div>

  <noscript id="deferred-styles">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" crossorigin="anonymous">
  </noscript>
  <script>var loadDeferredStyles = function() {var addStylesNode = document.getElementById("deferred-styles");var replacement = document.createElement("div");replacement.innerHTML = addStylesNode.textContent;document.getElementById("body__stacks").appendChild(replacement);addStylesNode.parentElement.removeChild(addStylesNode);};var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;if (raf) {raf(function() {window.setTimeout(loadDeferredStyles, 0);});} else {window.addEventListener('load', loadDeferredStyles);}</script> --}}


  @include('partials.modules.agent-header')

  @yield('content')

  @include('partials.footer.footer-agent')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
  {{-- <script src="{{ asset('packages/houzez/js/jquery-ui.js') }}" crossorigin="anonymous"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/jquery.matchHeight-min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/jquery.nicescroll.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/jquery.prettyPhoto.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/moment.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/modernizr.custom.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/slick.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/owl.carousel.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/isotope.pkgd.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/bootstrap-select.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('packages/houzez/js/bootstrap-datetimepicker.min.js') }}" crossorigin="anonymous"></script>

  @stack('body.after')
</body>
</html>

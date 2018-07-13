<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('meta-description', 'Description...')">
  <meta name="keywords" content="@yield('meta-keywords', 'keywords, xxx, xxx')">
  <meta name="csf-token" content="{{ csrf_token() }}">
  <title>@yield('meta-title',  config('site.tagline') . ' - ' . config('site.name'))</title>

  @yield('meta-tags')

  <link href="{{ cdn('icons.font-awesome-5') }}" rel="stylesheet" crossorigin="anonymous">
  {{-- <link href="{{ cdn('icons.font-awesome') }}" rel="stylesheet" crossorigin="anonymous"> --}}
  <!-- <link href="{{ cdn('fonts.open-sans') }}" rel="stylesheet" crossorigin="anonymous"> -->
  @yield('header.scripts')
  @stack('header.scripts')

  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
@php
  flush();
@endphp
<body class="{!! $body_class !!}">
    <div class="display-2 text-center bg-black text-white py-4">
        <p class="text-dark text-uppercase">Configuration Control Panel</p>
        <div class="body text-5">
            Backup database tables - <span class="text-success">completed</span><br><br>

            <span class="text-warning">Migrating: 2018_04_18_222017352910_create_listings_listings_table</span><br>
            <span class="text-success">Migrated:  2018_04_18_222017352910_create_listings_listings_table</span><br>
            <span class="text-warning">Migrating: 2018_04_18_222017609349_create_listings_listing_translations_table</span><br>
            <span class="text-success">Migrated:  2018_04_18_222017609349_create_listings_listing_translations_table</span><br><br>

            Loading composer repositories with package information<br>
            Updating dependencies (including require-dev) - <span class="text-success">completed</span><br><br>

            Generating autoload files<br>
            > Illuminate\Foundation\ComposerScripts::postAutoloadDump<br>
            > &at;php artisan package:discover
        </div>
        <!-- <div class="body">
            Estimate time remaining - <span id="countdown"></span>
        </div> -->
        <div class="display-4 mt-2 text-danger">
            An error maybe happen during the installation.
        </div>
    </div>

    <script>

        // // Set the date we're counting down to
        // var countDownDate = new Date("April 18, 2018 20:00:00").getTime();
        //
        // // Update the count down every 1 second
        // var x = setInterval(function() {
        //
        // // Get todays date and time
        // var now = new Date().getTime();
        //
        // // Find the distance between now an the count down date
        // var distance = countDownDate - now;
        //
        // // Time calculations for days, hours, minutes and seconds
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        //
        // // Output the result in an element with id="demo"
        // document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
        // + minutes + "m " + seconds + "s ";
        //
        // // If the count down is over, write some text
        // if (distance < 0) {
        //     clearInterval(x);
        //     document.getElementById("countdown").innerHTML = "EXPIRED";
        // }
        // }, 1000);

    </script>
  @yield('header')

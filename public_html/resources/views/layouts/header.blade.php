<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta name="google-site-verification" content="0etXhbe4bvt8pTzuRPilSkRES9mlkqzSxNIwujq-NR4" />
  <meta property="fb:app_id" content="{{ config('custom.facebook_app_id') }}" />
  <meta property="fb:pages" content="{{ get_facebook_page(config('custom.facebook')) }}" />
  <meta property="og:title" content="@yield('meta_title',  config('custom.meta_title'))">
  @if ($pagename === 'homepage')
    <meta property="og:type" content="@yield('meta_type',  'website')">
  @else
    <meta property="og:type" content="@yield('meta_type',  'article')">
  @endif
  <meta property="og:image" content="@yield('meta_image', asset('images/logo.png'))">
  <meta property="og:image:url" content="@yield('meta_image', asset('images/logo.png'))">
  <meta property="og:image:secure_url" content="@yield('meta_image', asset('images/logo.png'))">
  <meta property="og:url" content="@yield('meta_url', request()->fullUrl())">
  <meta property="og:description" content="@yield('meta_description',  config('custom.meta_description'))">
  <meta property="og:site_name" content="{{ config('custom.site_name') }}">
  <meta property="og:email" content="{{ config('custom.primary_email') }}">
  <meta property="og:phone_number" content="{{ config('custom.phone_number') }}">
  <meta property="og:fax_number" content="{{ config('custom.fax_number') }}">
  <meta property="og:street-address" content="{{ config('custom.office_address') }}">
  <meta property="place:location:latitude" content="{{ config('custom.lat') }}">
  <meta property="place:location:longitude" content="{{ config('custom.lng') }}">
  <meta property="og:locality" content="">
  <meta property="og:region" content="{{ config('custom.address.city') }}">
  <meta property="og:postal-code" content="{{ config('custom.address.state') }} {{ config('custom.address.postcode') }}">
  <meta property="og:country-name" content="{{ config('custom.address.country') }}">
  <meta property="og:locale" content="{{ app()->getLocale() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('meta_description', config('custom.meta_description'))">
  <meta name="keywords" content="@yield('meta_keywords', config('custom.meta_keywords'))">
  <meta name="csf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="@yield('meta_robots', 'index, follow')">
  <meta name="revisit-after" content="3 days">
  <meta name="distribution" content="Global">
  <meta http-equiv="Expires" content=0>
  <meta http-equiv="Cache-Control" content="private, max-age=600">
  <meta http-equiv="Ext-Cache" content="no-cache">
  <meta http-equiv="Pragma" content="no-cache">
  <title>@yield('meta_title',  config('custom.meta_title'))</title>
  
  <link rel="alternate" href="{{ url('/') }}" hreflang="x-default" />
  <link rel="canonical" href="@yield('meta_canonical', request()->fullUrl())">
  <link href="{{ asset('images/icon.png') }}" rel="icon" type="image/png" sizes="16x16">
  
  <link href="{{ cdn('icons.font-awesome-5') }}" rel="stylesheet" crossorigin="anonymous" media="all">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" crossorigin="anonymous" media="all">
  
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "{{ url('/') }}",
    "name": "{{ config('custom.site_name') }}",
    "description": "{{ config('custom.meta_description') }}",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "{{ url('search?s={search_term_string}') }}",
      "query-input": "required name=search_term_string"
    }
  }, {
    "@context": "https://schema.org",
    "@type": "Organization",
    "url": "{{ url('/') }}",
    "name": "{{ config('custom.site_name') }}",
    "telephone": "{{ config('custom.phone_number') }}",
    "faxNumber": "",
    "email": "{{ config('custom.primary_email') }}",
    "logo": "{{ url('images/logo.png') }}",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "{{ config('custom.city') . ', ' . config('custom.country') }}",
      "postalCode": "{{ config('custom.state') . ' ' . config('custom.address.postcode') }}",
      "streetAddress": "{{ config('custom.address.address') }}"
    },
    "contactPoint": [
      {
        "@type": "ContactPoint",
        "telephone": "{{ config('custom.phone_number') }}",
        "contactType": "customer service"
      }, {
        "@type": "ContactPoint",
        "telephone": "{{ config('custom.phone_number') }}",
        "contactType": "technical support"
      }
    ]
  }
  </script>
  
  @yield('meta-tags')

  <!-- Google Tag Manager -->
  <script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtag.id':'UA-119608555-1','gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j, f);})(window,document,'script','dataLayer','GTM-P7X97PV');</script>
  <!-- End Google Tag Manager -->
  
  @yield('header.scripts')
  @stack('header.scripts')
</head>
@php
  flush();
@endphp
<body class="{!! $body_class !!}">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7X97PV" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>

  @yield('header')

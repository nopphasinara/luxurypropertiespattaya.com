@php
  $hidden = implode(' ', [
    'overflow: hidden;',
  ]);
  $reset_link = implode(' ', [
    'text-decoration: none;',
  ]);
  $reset_icons = implode(' ', [
    'width: 40px !important;',
    'height: 40px !important;',
    'border: none !important;',
  ]);
@endphp

@push('top_border')
  <tr>
    <td style="width: 6px; {{ $hidden }}">
      &nbsp;
    </td>
    <td style="height: 6px; {{ $hidden }} background: url('{{ asset('images/gd-top.png') }}') repeat-x bottom center transparent;">
      &nbsp;
    </td>
    <td style="width: 6px; {{ $hidden }}">
      &nbsp;
    </td>
  </tr>
@endpush
@push('bottom_border')
  <tr>
    <td style="width: 6px; {{ $hidden }}">
      &nbsp;
    </td>
    <td style="height: 6px; {{ $hidden }} background: url('{{ asset('images/gd-bottom.png') }}') repeat-x top center transparent;">
      &nbsp;
    </td>
    <td style="width: 6px; {{ $hidden }}">
      &nbsp;
    </td>
  </tr>
@endpush
@push('left_border')
  <td style="width: 6px; {{ $hidden }} background: url('{{ asset('images/gd-left.png') }}') repeat-y top right transparent;">
    &nbsp;
  </td>
@endpush
@push('right_border')
  <td style="width: 6px; {{ $hidden }} background: url('{{ asset('images/gd-right.png') }}') repeat-y top left transparent;">
    &nbsp;
  </td>
@endpush

@component('components.mail.layout', compact('input'))
  {{-- Header --}}
  @slot('header')
    <table class="inner-body" width="600" @stack('table_reset')>
      <tr>
        <td colspan="4" style="height: 3em; {{ $hidden }}">&nbsp;</td>
      </tr>
      <tr>
        <td class="content-cell" style="text-align: left; vertical-align: middle;">
          <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" height="80" alt="{{ config('app.name') }}">
          </a>
        </td>
        <td class="content-cell" style="text-align: right; vertical-align: middle;">
          <label style="vertical-align: middle;">{{ $input['name'] }}</label>
        </td>
        <td class="content-cell" style="text-align: right; vertical-align: middle;">
          &nbsp;
        </td>
        <td class="content-cell" style="text-align: right; vertical-align: middle;">
          <img src="{{ asset('images/unnamed.png') }}" width="32" height="32" alt="{{ $input['name'] }}" style="vertical-align: middle;">
        </td>
      </tr>
      <tr>
        <td colspan="4" style="height: 1.5em; {{ $hidden }}">&nbsp;</td>
      </tr>
    </table>
  @endslot

  {{-- Body --}}
  <table class="inner-body" align="center" width="600" @stack('table_reset') style="background-color: #fff;">
    @stack('top_border')
    <tr>
      @stack('left_border')
      <td class="content-cell" align="left" style="padding: 1em 1.4em;">
        {!! $slot !!}
      </td>
      @stack('right_border')
    </tr>
    @stack('bottom_border')
  </table>

  {{-- Footer --}}
  @slot('footer')
    <table class="inner-body" align="center" width="600" @stack('table_reset')>
      <tr>
        <td style="height: 2em; {{ $hidden }}">&nbsp;</td>
      </tr>
      <tr>
        <td class="content-cell" align="center">
          <br>
          <a href="#" style="{{ $reset_link }}">
            <img src="{{ asset('img/icon-facebook.jpg') }}" alt="{{ config('custom.facebook') }}" style="{{ $reset_icons }}">
          </a>
          <a href="#" style="{{ $reset_link }}">
            <img src="{{ asset('img/icon-twitter.jpg') }}" alt="{{ config('custom.twitter') }}" style="{{ $reset_icons }}">
          </a>
          <a href="#" style="{{ $reset_link }}">
            <img src="{{ asset('img/icon-youtube.jpg') }}" alt="{{ config('custom.youtube') }}" style="{{ $reset_icons }}">
          </a>
          <a href="#" style="{{ $reset_link }}">
            <img src="{{ asset('img/icon-instagram.jpg') }}" alt="{{ config('custom.instagram') }}" style="{{ $reset_icons }}">
          </a>
        </td>
      </tr>
      <tr>
        <td style="height: 1em; {{ $hidden }}">&nbsp;</td>
      </tr>
      <tr>
        <td class="content-cell" align="center">
          &copy; 2018 {{ config('custom.company_name') }}
          <br>
          {{ config('custom.office_address') }}
        </td>
      </tr>
    </table>
  @endslot

@endcomponent

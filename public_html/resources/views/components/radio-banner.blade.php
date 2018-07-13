@if ((int) config('custom.radio_banner_visible') === 1)
  <div id="box-radio" class="box-right text-center text-md-left px-2 bg-white rounded-sm">
    <img src="{{ config('custom.radio_banner_white') }}" height="120" alt="Listen Live!">
    <div class="d-none">
      <audio data-radio-played="{{ $_COOKIE['is_radio_played'] or 0 }}" data-radio-url="{{ url('/radio-') }}" preload="none" style="width: 100%; height: 100%; background: transparent;" controls><source src="https://streams.radio.co/s102cd33bc/listen" type="audio/mpeg"></audio>
    </div>
    <div class="button-play-radio button button-on">Turn<br>On</div>
    <div class="button-play-radio button button-off d-none">Turn<br>Off</div>
  </div>
@endif

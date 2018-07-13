@if ($featured === true)
  @if (isset($featuredAds) && $featuredAds)
    <div class="component-ads text-center">
      <ul class="list-unstyled">
        @foreach ($featuredAds as $index => $data)
          <li class="mb-4 bg-transparent">
            <a href="{{ $data->url }}" target="_blank" rel="nofollow,noindex">
              <img class="card-img-top rounded-sm" src="{{ $data->thumbnail }}" alt="{{ $data->name }}">
            </a>
          </li>
        @endforeach
      </ul>
    </div><!-- /.component-recent-post -->
  @endif
@else
  @if (isset($ads) && $ads)
    <div class="component-ads text-center">
      <ul class="list-unstyled">
        @foreach ($ads as $index => $data)
          <li class="mb-4 bg-transparent">
            <a href="{{ $data->url }}" target="_blank" rel="nofollow,noindex">
              <img class="card-img-top rounded-sm" src="{{ $data->thumbnail }}" alt="{{ $data->name }}">
            </a>
          </li>
        @endforeach
      </ul>
    </div><!-- /.component-recent-post -->
  @endif
  
  {{-- @if ((int) config('custom.radio_banner_visible') === 1)
    <div class="col-md-auto py-1">
      <div class="box-right text-center text-md-left bg-black px-2">
        <a href="https://streams.radio.co/s102cd33bc/listen" target="_blank"><img src="{{ config('custom.radio_banner') }}" height="120" alt="Listen Live!"></a>
        <div><audio id="widget_stream" preload="none" style="width: 100%; height: 100%; background: transparent;" controls><source src="https://streams.radio.co/s102cd33bc/listen" type="audio/mpeg"></audio><script>var audio = document.getElementById("widget_stream");audio.volume = 0.4;</script></div>
      </div><!-- /.box-right -->
    </div>
  @endif --}}
@endif

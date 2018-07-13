<div class="component-recent-post bg-gray-300 px-3 py-3">
  <h4 class="bold text-uppercase">Recent Post</h4>
  <div class="line-1 bg-2d-gray-200 mb-2"></div>
  @if ($recentNews)
    <ul class="list-unstyled">
      @foreach ($recentNews as $index => $data)
        <li>
          <div class="row mb-4">
            <div class="col-auto">
              <a href="{{ $data->permalink }}">
                <div class="bg-wrapper w-80px h-80px">
                  <div class="bg-image bg-gray-600 rounded-sm">
                    <img class="top-50 bottom-0" src="{{ $data->thumbnail }}" width="100%" alt="{{ $data->name }}">
                  </div>
                </div>
              </a>
            </div>
            <div class="col">
              <h5 class="bold"><a href="{{ $data->permalink }}">{{ $data->name }}</a></h5>
              <i class="fa fa-fw fa-calendar-alt"></i> {{ $data->created_date }}
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  @endif
</div><!-- /.component-recent-post -->

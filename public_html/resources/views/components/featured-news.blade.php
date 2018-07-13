<div class="row">
  <div class="col-12">
    <div id="featured-news">
      <div class="box-thumbnail mb-2">
        <a href="{{ $featuredNews->permalink }}">
          <div class="bg-wrapper h-400px bg-gray-600 rounded-sm">
            <div class="bg-image bg-gray-600 rounded-sm">
              <img class="top-50 bottom-0" src="{{ $featuredNews->thumbnail }}" alt="{{ $featuredNews->name }}">
            </div>
          </div>
        </a>
      </div><!-- /.box-thumbnail -->
      <div class="box-details">
        <h2 class="bold"><a href="{{ $featuredNews->permalink }}">{{ $featuredNews->name }}</a></h2>
        <ul class="list-inline">
          @if ($featuredNews->category())
            <li class="list-inline-item">
              <i class="fa fa-fw fa-bookmark"></i> <a href="{{ $featuredNews->category()->permalink }}">{{ $featuredNews->category()->name }}</a>
            </li>
          @endif
          <li class="list-inline-item">
            <i class="fa fa-fw fa-calendar-alt"></i> {{ $featuredNews->created_date }}
          </li>
        </ul>
        @if ($featuredNews->description)
          <div class="box-description mb-2">
            {!! str_limit($featuredNews->description, 150, '...') !!}
          </div>
        @endif
        <a class="bold text-uppercase" href="{{ $featuredNews->permalink }}">Read More &raquo;</a>
      </div><!-- /.box-details -->
    </div>
  </div>
</div>
<div class="line-1 mt-4 mb-6"></div>

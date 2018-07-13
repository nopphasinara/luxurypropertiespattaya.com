<div class="component-category bg-gray-300 px-3 py-3 mb-6 rounded-sm">
  <h4 class="bold text-uppercase">Category</h4>
  <div class="line-1 bg-2d-gray-200 mb-2"></div>
  <ul class="list-unstyled mb-0">
    @if ($newsCategories && $newsCategories->count())
      @foreach ($newsCategories as $index => $newsCategory)
        <li class="mb-1">
          <a href="{{ $newsCategory->permalink }}">{{ $newsCategory->name }}</a>
        </li>
      @endforeach
    @endif
  </ul>
</div><!-- /.component-category -->

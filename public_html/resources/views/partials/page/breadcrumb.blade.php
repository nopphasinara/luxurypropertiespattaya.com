@if (isset($breadcrumb) && $breadcrumb)
  <nav class="bg-white" aria-label="breadcrumb">
    <ol class="breadcrumb">
      @foreach ($breadcrumb as $key => $item)
        {!! $item[0] !!}
      @endforeach
    </ol>
  </nav>
@endif

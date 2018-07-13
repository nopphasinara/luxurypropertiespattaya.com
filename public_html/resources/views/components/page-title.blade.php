<!-- #page-title -->
<div id="page-title" class="pt-6 pb-2">
  <div class="container">
    @isset($title)
      <h1 class="bold mt-0 mb-1">{!! $title !!}</h1>
    @endisset
    @isset($subtitle)
      <h2 class="text-gray-600 my-0">{!! $subtitle !!}</h2>
    @endisset
    <div class="line-1 mt-3 mb-1"></div>
  </div><!-- /.container -->

  {!! $slot !!}
</div>
<!-- /#page-title -->

@if ($property->features_list && $property->features_list->count())
  <div id="property-features" class="mb-2x">
    <h3 class="bold text-uppercase">Features</h3>
    <div class="row mb-1x">
      @foreach ($property->features_list as $key => $features)
        <div class="col-12 col-sm-6 mb-1">
          <i class="fa fa-fw fa-check text-success"></i> {{ $features->name }}
        </div>
      @endforeach
    </div>
  </div>
@endif

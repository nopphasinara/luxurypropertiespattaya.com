<div id="facilities" class="mb-4">
  <div class="row">
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> <strong>Ref No: {{ $refno = ($property->refno) ? $property->refno : '-' }}</strong>
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Listing Type: @if ($property->listing_type && $property->listing_type->name)
        {{ $property->listing_type->name }}
      @else
        -
      @endif
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Location: @if ($property->location && $property->location->name)
        {{ $property->location->name }}
      @else
        -
      @endif
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Living Area: {{ $living_area = ($property->living_area) ? $property->living_area : '-' }}
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Land Area: {{ $land_area = ($property->land_area) ? $property->land_area : '-' }}
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Bedrooms: {{ $bedrooms = ($property->bedrooms) ? $property->bedrooms : '-' }}
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Bathrooms:  {{ $bathrooms = ($property->bathrooms) ? $property->bathrooms : '-' }}
    </div>
    <div class="col-12 col-sm-6 mb-1">
      <i class="fa fa-fw fa-circle text-primary"></i> Ownership: @if ($property->ownership)
        {{ $property->ownership }}
      @else
        -
      @endif
    </div>
    @if ($property->facilities_list && $property->facilities_list->count())
      @foreach ($property->facilities_list as $index => $facilities)
        <div class="col-12 col-sm-6 mb-1">
          <i class="fa fa-fw fa-circle text-primary"></i> {{ $facilities->name }}
        </div>
      @endforeach
    @endif
  </div>
</div>

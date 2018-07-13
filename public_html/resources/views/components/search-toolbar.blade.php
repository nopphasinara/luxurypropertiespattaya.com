<!-- #search-toolbar -->
<div id="search-toolbar" class="bg-gray-400 py-2">
  <div class="container">
    <form class="needs-validation" action="{{ url('search') }}" method="get" novalidate>
      <input type="hidden" id="page" name="page" value="{{ request('page', 1) }}">
      <div class="form-row align-items-center">
        <div class="col">
          <div class="input-group">
            <input type="text" class="form-control" id="s" name="s" placeholder="Enter a search keyword" value="{{ request('s', '') }}">
          </div>
        </div>

        <!-- Price -->
        {{-- <div class="col-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mx-0 px-0">
              <select class="form-control" id="minPrice" name="minPrice">
                <option value="" selected>Min Price</option>
                @for ($i = 1; $i <= 10; $i++)
                  <option value="{{ $i }}" {{ $selected = (request('minPrice', '') == $i) ? 'selected' : '' }}>{{ ($i * 100000) }}</option>
                @endfor
              </select>
            </li>
            <li class="list-inline-item mx-0 px-0">to</li>
            <li class="list-inline-item mx-0 px-0">
              <select class="form-control" id="maxPrice" name="maxPrice">
                <option value="" selected>Max Price</option>
                @for ($i = 1; $i <= 10; $i++)
                  <option value="{{ $i }}" {{ $selected = (request('maxPrice', '') == $i) ? 'selected' : '' }}>{{ ($i * 100000) }}</option>
                @endfor
              </select>
            </li>
          </ul>
        </div> --}}

        <!-- Beds -->
        {{-- <div class="col-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mx-0 px-0">
              <select class="form-control" id="minBeds" name="minBeds">
                <option value="" selected>Min Beds</option>
                @for ($i = 1; $i <= 10; $i++)
                  <option value="{{ $i }}" {{ $selected = (request('minBeds', '') == $i) ? 'selected' : '' }}>{{ ($i) }}</option>
                @endfor
              </select>
            </li>
            <li class="list-inline-item mx-0 px-0">to</li>
            <li class="list-inline-item mx-0 px-0">
              <select class="form-control" id="maxBeds" name="maxBeds">
                <option value="" selected>Max Beds</option>
                @for ($i = 1; $i <= 10; $i++)
                  <option value="{{ $i }}" {{ $selected = (request('maxBeds', '') == $i) ? 'selected' : '' }}>{{ ($i) }}</option>
                @endfor
              </select>
            </li>
          </ul>
        </div> --}}

        <!-- PropertyType -->
        <div class="col-auto">
          <div class="input-group">
            <select class="form-control" name="propertyFor">
              <option value="" selected>For Sale/Rent</option>
              <option value="sale" {{ $selected = (request('propertyFor', '') == 'sale') ? 'selected' : '' }}>For Sale</option>
              <option value="rent" {{ $selected = (request('propertyFor', '') == 'rent') ? 'selected' : '' }}>For Rent</option>
            </select>
          </div>
        </div>
        
        <!-- PropertyType -->
        <div class="col-auto">
          <div class="input-group">
            <select class="form-control" name="propertyType">
              <option value="" selected>Any Types</option>
              @if ($propertyTypes)
                @foreach ($propertyTypes as $index => $propertyType)
                  <option value="{{ $propertyType->id }}" {{ $selected = (request('propertyType', '') == $propertyType->id) ? 'selected' : '' }}>{{ $propertyType->name }}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
        
        <!-- Locations -->
        <div class="col-auto">
          <div class="input-group">
            <select class="form-control" name="location">
              <option value="" selected>Any Locations</option>
              @if ($locations)
                @foreach ($locations as $index => $location)
                  <option value="{{ $location->id }}" {{ $selected = (request('location', '') == $location->id) ? 'selected' : '' }}>{{ $location->name }}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>

        <div class="col-auto">
          <div class="input-group">
            <button class="btn btn-secondary" type="submit">
              <i class="fa fa-fw fa-lg fa-search align-baseline"></i>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div><!-- /.container -->
  {{ $slot }}
</div>
<!-- /#search-toolbar -->

@push('footer.scripts')
  <script>
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
  </script>
@endpush

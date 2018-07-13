<p class="text-3 medium text-primary mb-4">
  Alternatively you can fill in the following contact form:
</p>

<div class="row pb-2x">
  <div class="col-md mb-6 mb-md-0">
    @push('footer.scripts')
      @include('flash::message')
      <script>
        $('.flash-overlay-modal').modal();
      </script>
    @endpush
    
    @if ($errors->any())
      @php
        $error_message = '';
        
        foreach ($errors->all() as $error) {
          $error_message .= $error;
        }
        
        flash()->overlay('<p class="lead pb-2 text-center text-danger">'. $error_message .'</p><div class="px-3"><div class="btn btn-danger btn-block btn-sm mb-3" data-dismiss="modal">Close</div></div>', '<h3 class="mt-4 mb-0 text-danger text-center w-100"><p class="mb-3"><i class="far fa-5x fa-times-circle"></i></p><p class="mb-1">Error!</p></h3>');
      @endphp
      
      {{-- <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div> --}}
    @endif
    
    <form class="needs-validation" id="contactForm" name="sentMessage" action="{{ route('contact-us-submit') }}" method="post" novalidate>
      {{ csrf_field() }}
      <div class="control-group form-group">
        <div class="controls">
          <label>Full Name:</label>
          <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label>Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label>Phone Number:</label>
          <input type="tel" class="form-control" id="phone" name="phone" data-validation-required-message="Please enter your phone number.">
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label>Subject:</label>
          <input type="text" class="form-control" id="subject" name="subject" required data-validation-required-message="Please enter your email address.">
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label>Message:</label>
          <textarea rows="10" cols="100" class="form-control" id="message" name="message" data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
        </div>
      </div>
      <div id="success"></div>
      <!-- For success/fail messages -->
      <button type="submit" class="btn text-4 text-uppercase bold btn-primary" id="sendMessageButton">Send Message</button>
    </form>
  </div>
  <div class="col-md">
    <h3 class="bold pt-2 text-uppercase">Get in Touch Today</h3>
    <p class="lead bold mb-0 text-primary">Office Address:</p>
    <p class="lead mb-3">
      {{ config('custom.office_address') }}
    </p>
    <ul class="list-unstyled mb-6 mb-md-3">
      <li class="lead">
        <i class="fa fa-fw fa-lg text-primary fa-phone"></i> <span class="bold">{{ config('custom.phone_number') }}</span>
      </li>
      <li class="lead">
        <i class="fa fa-fw fa-lg text-primary fa-envelope"></i> <span class="bold">{{ config('custom.primary_email') }}</span>
      </li>
      <li class="lead">
        <i class="fa fa-fw fa-lg text-primary fa-clock-o"></i> {{ config('custom.open_hours') }}
      </li>
    </ul>

    <!-- #google-map -->
    <div id="google-map">
      <div id="comp-ii8oy6z1" title="Google Maps" aria-label="Google Maps">
        <div id="comp-ii8oy6z1mapContainer" class="gm1mapContainer box-shadow">
          <div id="google-map2" class="h-300px"></div>
          @push('footer.scripts')
            <script>
            function initMap() {
              var uluru = {lat: {{ config('custom.lat') }}, lng: {{ config('custom.lng') }}};
              var map = new google.maps.Map(document.getElementById('google-map2'), {
                zoom: 10,
                center: uluru
              });
              var marker = new google.maps.Marker({
                position: uluru,
                map: map
              });
            }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap"></script>
          @endpush
        </div>
      </div>
    </div>
    <!-- /#google-map -->
  </div>
</div>

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

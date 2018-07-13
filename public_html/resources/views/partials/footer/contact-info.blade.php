<!-- #contact-info -->
<div id="contact-info" class="position-relative bg-gray-200 py-1x">
  <div class="bg-image fade-0">
    <img src="{{ asset('images/bg-jumbotron-small-3.jpg') }}" alt="Making Dreams Come True">
  </div>
  <div class="container">
    <h2 class="h2x bold mb-4 text-center">CONTACT US</h2>
    <div class="row">
      <div class="col-md-6">
        <p class="lead bold mb-0 text-primary">Office Address:</p>
        <p class="lead mb-4">
          {{ config('custom.office_address') }}
        </p>
        <ul class="list-unstyled mb-4">
          <li class="lead mb-2">
            <i class="fa fa-fw fa-lg text-primary fa-phone"></i> <span class="bold">{{ config('custom.phone_number') }}</span>
          </li>
          <li class="lead mb-2">
            <i class="fa fa-fw fa-lg text-primary fa-envelope"></i> <span class="bold">{{ config('custom.primary_email') }}</span>
          </li>
          <li class="lead mb-2">
            <i class="fa fa-fw fa-lg text-primary fa-clock"></i> {{ config('custom.open_hours') }}
          </li>
        </ul>
        
        <div id="google-map" class="box-shadow bg-gray-800 h-400px"></div>
        @push('footer.scripts')
          <script>
          function initMap() {
            var uluru = {lat: {{ config('custom.lat') }}, lng: {{ config('custom.lng') }}};
            var map = new google.maps.Map(document.getElementById('google-map'), {
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
        
        <p class="h4 mt-4 mb-1 bold text-center">
          <span class="text-indigo text-uppercase">Contact {{ config('custom.site_name') }} at</span>
        </p>
        <p class="h4 mb-4 mt-0 bold text-center">
          <span class="text-primary"><i class="fas fa-fw fa-phone"></i> {{ config('custom.phone_number') }}</span>
        </p>
      </div>
      <div class="col-md-6">
        <h2 class="h3 bold mb-3 text-primary">ALTERNATIVELY YOU CAN FILL IN THE FOLLOWING CONTACT FORM:</h2>
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
    </div>
  </div><!-- /.container -->
</div>
<!-- /#contact-info -->

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

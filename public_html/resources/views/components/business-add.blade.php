<div class="component-add-listing mb-6">
  <h4 class="bold text-primary text-uppercase">Add Your Business</h4>
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
  
  <form class="needs-validation" id="addBusinessForm" name="sentMessage" action="{{ route('business-add-submit') }}" method="post" enctype="multipart/form-data" novalidate>
    {{ csrf_field() }}
    <div class="control-group form-group">
      <div class="controls">
        <label>Business Name:</label>
        <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
        <p class="help-block"></p>
        <div class="invalid-feedback">
          Please enter your name
        </div>
      </div>
    </div>
    <div class="control-group form-group">
      <div class="controls">
        <label>Phone Number:</label>
        <input type="tel" class="form-control" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
        <div class="invalid-feedback">
          Please enter your phone number
        </div>
      </div>
    </div>
    <div class="control-group form-group">
      <div class="controls">
        <label>Email Address:</label>
        <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
        <div class="invalid-feedback">
          Please enter your email address
        </div>
      </div>
    </div>
    <div class="control-group form-group">
      <div class="controls">
        <label>Website:</label>
        <input type="url" class="form-control" id="website" name="website" data-validation-required-message="Please enter your email address.">
        <div class="invalid-feedback">
          Please enter your email address
        </div>
      </div>
    </div>
    <div class="control-group form-group">
      <div class="controls">
        <label>Category:</label>
        <select class="form-control" name="category_id" id="category_id" required data-validation-required-message="Please choose your category.">
          <option value="">Choose</option>
          {!! $categoriesTree !!}
        </select>
        <div class="invalid-feedback">
          Please choose your category
        </div>
      </div>
    </div>
    <div class="control-group form-group">
      <div class="controls">
        <label>Your Logo:</label>
        <div class="custom-file">
          <label class="custom-file-label" for="customFile">Choose file</label>
          <input type="file" class="custom-file-input" name="image" id="customFile">
        </div>
      </div>
    </div>
    <div class="control-group form-group">
      <div class="controls">
        <label>Description:</label>
        <textarea rows="10" cols="100" class="form-control" id="message" name="message" data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
      </div>
    </div>
    <div id="success"></div>
    <!-- For success/fail messages -->
    <button type="submit" class="btn btn-block text-5 text-uppercase bold btn-primary" id="sendMessageButton">Submit</button>
  </form>
</div><!-- /.component-add-listing -->

@push('footer.scripts')
  @include('flash::message')
  
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
  
  $('.flash-overlay-modal').modal();
  </script>
@endpush

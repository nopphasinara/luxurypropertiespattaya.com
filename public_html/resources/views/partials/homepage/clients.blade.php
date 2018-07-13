@if (isset($testimonials) && $testimonials)
  <!-- #clients -->
  <div id="clients" class="position-relative py-2x">
    <div class="container position-relative">
      <h2 class="h2x text-uppercase bold text-center mb-5 text-white">WHAT OUR CLIENTS THINK</h2>
      <div class="row">
        @foreach ($testimonials as $index => $testimonial)
          <div class="col-lg-4 mb-3 text-center">
            <div class="box-description px-2 py-3 rounded">
              <blockquote class="blockquote">
                <i class="fa fa-fw fa-2x fa-quote-left mb-2 text-2l-gold"></i>
                <div class="bold m-b-0 text-white">
                  {!! $testimonial->message !!}
                </div>
                <footer class="text-1l-gold blockquote-footer">{{ $testimonial->name }}</footer>
              </blockquote>
            </div>
          </div>
        @endforeach
      </div>
    </div><!-- /.container -->
  </div>
  <!-- /#clients -->
@endif

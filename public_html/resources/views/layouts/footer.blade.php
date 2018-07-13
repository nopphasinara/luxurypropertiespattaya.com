
  @yield('footer')

  <div id="current-device">
    <div class="xs d-block d-sm-none">XS</div>
    <div class="sm d-none d-sm-block d-md-none">SM</div>
    <div class="md d-none d-md-block d-lg-none">MD</div>
    <div class="lg d-none d-lg-block">LG</div>
  </div><!-- /#currentDevice -->

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
  <script src="{{ asset('js/holder.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b1046d0c1304515"></script>
  
  @stack('footer.scripts')
</body>
</html>

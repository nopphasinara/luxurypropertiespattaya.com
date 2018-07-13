<!-- #navbar-main -->
<div id="navbar-main" class="navbar navbar-expand-lg navbar-dark bg-primary p-0" role="navigation">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbar-main-collapse">
      <ul class="navbar-nav nav-fill w-100">
        <li class="{{ $pages['homepage'] }} nav-item">
          <a class="nav-link text-uppercase" href="{{ url('/') }}">
            <i class="fa fa-fw fa-lg fa-home"></i> Home
          </a>
        </li>
        <li class="{{ $pages['for-sale'] }} nav-item dropdown">
          <a class="nav-link text-uppercase" href="#" id="submenuForSale" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Sale</a>
          <div class="dropdown-menu" aria-labelledby="submenuForSale">
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('East Pattaya') . '-for-sale') }}">East Pattaya Properties For Sale</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Golf Course') . '-for-sale') }}">Golf Course Properties For Sale</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Jomtien') . '-for-sale') }}">Jomtien Properties For Sale</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Naklua') . '-for-sale') }}">Naklua Properties For Sale</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Pattaya') . '-for-sale') }}">Pattaya Properties For Sale</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Rayong') . '-for-sale') }}">Rayong Properties For Sale</a>
          </div>
        </li>
        <li class="{{ $pages['for-rent'] }} nav-item dropdown">
          <a class="nav-link text-uppercase" href="#" id="submenuForRent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">For Rent</a>
          <div class="dropdown-menu" aria-labelledby="submenuForRent">
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('East Pattaya') . '-for-rent') }}">East Pattaya Properties For Rent</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Golf Course') . '-for-rent') }}">Golf Course Properties For Rent</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Jomtien') . '-for-rent') }}">Jomtien Properties For Rent</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Naklua') . '-for-rent') }}">Naklua Properties For Rent</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Pattaya') . '-for-rent') }}">Pattaya Properties For Rent</a>
            <a class="dropdown-item" href="{{ url('properties-in-' . str_slug('Rayong') . '-for-rent') }}">Rayong Properties For Rent</a>
          </div>
        </li>
        <li class="{{ $pages['business-directory'] }} nav-item">
          <a class="nav-link text-uppercase" href="{{ url('business-directory') }}">Business Directory</a>
        </li>
        <li class="{{ $pages['news-and-information'] }} nav-item">
          <a class="nav-link text-uppercase" href="{{ url('news-and-information') }}">News & Information</a>
        </li>
        <li class="{{ $pages['about-us'] }} nav-item">
          <a class="nav-link text-uppercase" href="{{ url('about-us') }}">About Us</a>
        </li>
        <li class="{{ $pages['contact-us'] }} nav-item">
          <a class="nav-link text-uppercase" href="{{ url('contact-us') }}">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- /#navbar-main -->

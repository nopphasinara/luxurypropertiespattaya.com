@extends('layouts.main')

@section('header')
  @include('partials.header.header')
@endsection

@section('content')
  @component('components.page-title')
    @slot('title', 'News and Information')
    {{-- @slot('subtitle', '') --}}
  @endcomponent
  
  <div class="container">
    <div class="row mb-2x">
      @if (request()->get('ver') == 2)
        <div class="col-12 col-lg-8">
          <div class="row">
            @for ($i = 1; $i <= 10; $i++)
              <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-6">
                <div class="row">
                  <div class="col-12">
                    <div class="thumbnail mb-2">
                      <a href="#">
                        <div class="bg-wrapper h-200px">
                          <div class="bg-image rounded-sm">
                            <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-12">
                    <h2 class="bold"><a href="{!! _url('/news/12345/title') !!}" title="">Lorem ipsum dolor sit amet</a></h2>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <i class="fa fa-fw fa-bookmark"></i> <a href="#">General</a>
                      </li>
                      <li class="list-inline-item">
                        <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
                      </li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim niam.</p>
                    <a class="bold text-uppercase" href="#">Read More &raquo;</a>
                  </div>
                </div>
              </div>
            @endfor
          </div>
          
          <!-- #pagination -->
          <div id="pagination" class="text-center mt-4">
            <ul class="pagination justify-content-center lead bold">
              <li class="page-item">
                <a class="px-2 page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item">
                <a class="px-2 page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="px-2 page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="px-2 page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="px-2 page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>

            <div class="result">
              1-15 of 7,504 Results
            </div>
          </div>
          <!-- /#pagination -->
        </div>
        <div class="col-12 col-lg-4">
          <div class="component-category bg-gray-300 px-3 py-3 mb-6">
            <h4 class="bold text-uppercase">Category</h4>
            <div class="line-1 bg-2d-gray-200 mb-2"></div>
            <ul class="list-unstyled mb-0">
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
              <li class="mb-1">
                <a href="#">Category Name</a>
              </li>
            </ul>
          </div><!-- /.component-category -->
          
          <div class="component-recent-post bg-gray-300 px-3 py-3">
            <h4 class="bold text-uppercase">Recent Post</h4>
            <div class="line-1 bg-2d-gray-200 mb-2"></div>
            <ul class="list-unstyled">
              <li>
                <div class="row mb-4">
                  <div class="col-auto">
                    <div class="bg-wrapper w-80px h-80px">
                      <div class="bg-image">
                        <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h5 class="bold"><a href="#">Post Title</a></h5>
                    <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
                  </div>
                </div>
              </li>
              <li>
                <div class="row mb-4">
                  <div class="col-auto">
                    <div class="bg-wrapper w-80px h-80px">
                      <div class="bg-image">
                        <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h5 class="bold"><a href="#">Post Title</a></h5>
                    <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
                  </div>
                </div>
              </li>
              <li>
                <div class="row mb-4">
                  <div class="col-auto">
                    <div class="bg-wrapper w-80px h-80px">
                      <div class="bg-image">
                        <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h5 class="bold"><a href="#">Post Title</a></h5>
                    <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
                  </div>
                </div>
              </li>
              <li>
                <div class="row mb-4">
                  <div class="col-auto">
                    <div class="bg-wrapper w-80px h-80px">
                      <div class="bg-image">
                        <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h5 class="bold"><a href="#">Post Title</a></h5>
                    <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-auto">
                    <div class="bg-wrapper w-80px h-80px">
                      <div class="bg-image">
                        <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <h5 class="bold"><a href="#">Post Title</a></h5>
                    <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
                  </div>
                </div>
              </li>
            </ul>
          </div><!-- /.component-recent-post -->
        </div>
      @else
        @for ($i = 1; $i <= 15; $i++)
          <div class="col-12 col-md-6 col-lg-4 mb-6">
            <div class="thumbnail mb-2">
              <a href="#">
                <div class="bg-wrapper h-240px">
                  <div class="bg-image rounded-sm">
                    <img src="{!! asset('/images/bg-demo.jpg') !!}" alt="...">
                  </div>
                </div>
              </a>
            </div>
            <h2 class="bold"><a href="{!! _url('/news/12345/title') !!}" title="">Lorem ipsum dolor sit amet</a></h2>
            <ul class="list-inline">
              <li class="list-inline-item">
                <i class="fa fa-fw fa-bookmark"></i> <a href="#">General</a>
              </li>
              <li class="list-inline-item">
                <i class="fa fa-fw fa-calendar-alt"></i> 24 March 2018
              </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim niam.</p>
          </div>
        @endfor
      @endif
    </div>
  </div><!-- /.container -->
@endsection

@section('footer')
  {{-- @include('partials.footer.footer-links') --}}
  @include('partials.footer.footer')
@endsection

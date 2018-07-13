@if ($paginator->hasPages())
  <div class="row pb-2x">
    <div class="col-12">
      <div id="pagination" class="text-center">
        <ul class="pagination lead bold justify-content-center">
          {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
            <li class="page-item disabled">
              <span class="px-2 page-link" aria-hidden="true">&laquo;</span>
              <span class="sr-only">First</span>
            </li>
            <li class="page-item disabled">
              <span class="px-2 page-link" aria-hidden="true">&lsaquo;</span>
              <span class="sr-only">Prev</span>
            </li>
          @else
            <li class="page-item">
              <a class="px-2 page-link" href="{!! request_query('url', ['page' => 1]) !!}" aria-label="First">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">First</span>
              </a>
            </li>
            <li class="page-item">
              <a class="px-2 page-link" href="{!! request_query('url', ['page' => $paginator->currentPage() - 1]) !!}" aria-label="Prev">
                <span aria-hidden="true">&lsaquo;</span>
                <span class="sr-only">Prev</span>
              </a>
            </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
              <li class="page-item disabled">
                <span class="px-2 page-link">{{ $element }}</span>
              </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
              @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                  <li class="page-item active">
                    <span class="px-2 page-link">{{ $page }}</span>
                  </li>
                @else
                  <li class="page-item">
                    <a class="px-2 page-link" href="{{ request_query('url', ['page' => $page]) }}">{{ $page }}</a>
                  </li>
                @endif
              @endforeach
            @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
            <li class="page-item">
              <a class="px-2 page-link" href="{!! request_query('url', ['page' => $paginator->currentPage() + 1]) !!}" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
            <li class="page-item">
              @if ($paginator->currentPage() != $paginator->lastPage())
                <a class="px-2 page-link" href="{!! request_query('url', ['page' => $paginator->lastPage()]) !!}" aria-label="Last">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Last</span>
                </a>
              @endif
            </li>
          @else
            <li class="page-item disabled">
              <span class="page-link" aria-hidden="true">&rsaquo;</span>
              <span class="sr-only">Next</span>
            </li>
            <li class="page-item disabled">
              <span class="page-link" aria-hidden="true">&raquo;</span>
              <span class="sr-only">Last</span>
            </li>
          @endif
        </ul>

        <div class="result d-none">
          {!! $paginator->firstItem() !!}-{!! $paginator->lastItem() !!} of {!! $paginator->total() !!} Results
        </div>
      </div>
    </div>
  </div>
@endif

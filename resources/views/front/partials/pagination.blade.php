<div class="dataTables_paginate paging_simple_numbers bg-white" id="DataTables_Table_0_paginate">
    <ul class="pagination flex list-style-none">
      @if ($paginator->onFirstPage())
        <li class="paginate_button previous disabled flex items-center px-4 py-2 text-sm font-medium text-gray-500 cursor-not-allowed">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">
            Previous
          </a>
        </li>
      @else
        <li class="paginate_button previous active flex items-center px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <a href="{{ $paginator->previousPageUrl() }}" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">
            Previous
          </a>
        </li>
      @endif
  
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="paginate_button disabled flex items-center px-4 py-2 text-sm font-medium text-gray-500 cursor-not-allowed">
            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">
              {{ $element }}
            </a>
          </li>
        @endif
  
        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="paginate_button active flex items-center px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">
                  {{ $page }}
                </a>
              </li>
            @else
              <li class="paginate_button flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ $url }}" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">
                  {{ $page }}
                </a>
              </li>
            @endif
          @endforeach
        @endif
      @endforeach
  
      @if ($paginator->hasMorePages())
        <li class="paginate_button next active flex items-center px-4 py-2 text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <a href="{{ $paginator->nextPageUrl() }}" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">
            Next
          </a>
        </li>
      @else
        <li class="paginate_button next disabled flex items-center px-4 py-2 text-sm font-medium text-gray-500 cursor-not-allowed">
          <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">
            Next
          </a>
        </li>
      @endif
    </ul>
  </div>
  
<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="paginate_button previous disabled" id="DataTables_Table_0_previous">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">
                    Previous
                </a>
            </li>
        @else
            <li class="paginate_button previous active" id="DataTables_Table_0_previous">
                <a href="{{ $paginator->previousPageUrl() }}" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" style="cursor: pointer">
                    Previous
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="paginate_button disabled">
                    <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">
                        {{ $element }}
                    </a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button active">
                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li class="paginate_button">
                            <a href="{{ $url }}" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="paginate_button next active" id="DataTables_Table_0_next">
                <a href="{{ $paginator->nextPageUrl() }}" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" style="cursor: pointer">
                    Next
                </a>
            </li>
        @else
            <li class="paginate_button next disabled" id="DataTables_Table_0_next">
                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">
                    Next
                </a>
            </li>
        @endif
    </ul>
</div>
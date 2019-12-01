@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!--<li class="disabled"><span>&laquo;</span></li>!-->
            <li class="paginate_button page-item previous" id="dataTable_previous">
                <a href="{{$paginator->previousPageUrl()}}" rel="prev" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
            </li>
        @else
            <!--<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li> !-->

            <li class="paginate_button page-item previous" id="dataTable_previous">
                <a href="{{$paginator->previousPageUrl()}}" rel="prev" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <!--<li class="disabled"><span>{{ $element }}</span></li>!-->
                <li class="paginate_button page-item previous" id="dataTable_previous">
                    <a href="{{$paginator->previousPageUrl()}}" rel="prev" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <!-- <li class="active"><span>{{ $page }}</span></li>!-->

                        <li class="paginate_button page-item active">
                            <a href="{{ $url }}" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">{{ $page }}</a>
                        </li>
                    @else
                    <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> !-->

                        <li class="paginate_button page-item">
                            <a href="{{ $url }}" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">{{ $page }}</a>
                        </li>

                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <!-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>!-->

            <li class="paginate_button page-item next" id="dataTable_next">
                <a href="{{$paginator->nextPageUrl()}}" rel="next" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
            </li>
            
        @else
            <!-- <li class="disabled"><span>&raquo;</span></li> !-->

            <li class="paginate_button page-item next" id="dataTable_next">
                <a href="{{$paginator->nextPageUrl()}}" rel="next" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
            </li>
            
        @endif
    </ul>
@endif

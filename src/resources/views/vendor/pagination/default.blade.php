@if ($paginator->hasPages())
    <ul class="paging_num">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paging_prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">&lsaquo;&nbsp;&nbsp;先頭</li>
        @else
            <li class="paging_prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;&nbsp;&nbsp;先頭</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="this">{{ $page }}</li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paging_next"><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">最後&nbsp;&nbsp;&rsaquo;</a></li>
        @else
            <li class="paging_next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">最後&nbsp;&nbsp;&rsaquo;</li>
        @endif
    </ul>
@endif

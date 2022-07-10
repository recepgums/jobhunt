@if ($paginator->hasPages())
    <div class="pagination">
        <ul>
            @if ($paginator->onFirstPage())
                <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
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
                                <li class="active" aria-current="page"><a>{{ $page }}</a></li>
                        @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
        <li><a href="">3</a></li>
        <li><span class="delimeter">...</span></li>
        <li><a href="">14</a></li>
        <li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>

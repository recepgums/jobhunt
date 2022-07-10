@if ($paginator->hasPages())
    <div class="pagination">
        <ul>
            @if ($paginator->onFirstPage())
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}"><i class="la la-long-arrow-left"></i> Prev</a></li>

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
                    <li class="next"><a href="{{ $paginator->nextPageUrl() }}">Next <i class="la la-long-arrow-right"></i></a></li>
            @else
            @endif
        </ul>
    </div>
@endif

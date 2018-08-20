@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item"><a class="page-link" style="border-color:transparent;"><i class="fa fa-chevron-left" style="color:#f58764;"></i></a></li>
        @else
            <li class="page-item"><a class="page-link" style="border-color:transparent;" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-chevron-left" style="color:#f58764;"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item"><a class="page-link active" style="background-color:transparent;border-color:transparent; " href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-chevron-right"></i></a></li>
        @else
            <li class="disabled page-item"><span><a class="page-link" style="border-color:transparent;"><i class="fa fa-chevron-right" style="color:#f58764;"></i></a></span></li>
        @endif
    </ul>
@endif

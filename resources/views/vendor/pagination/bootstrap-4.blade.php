@if ($paginator->hasPages())        
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="pagination-container margin-top-30 margin-bottom-0">
            <nav class="pagination">
                <ul>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    <li><a ><i class="sl sl-icon-arrow-left"></i></a></li>
                    @else
                    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="sl sl-icon-arrow-left"></i></a></li>
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
                                    <li><a class="current-page">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                     {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}"><i class="sl sl-icon-arrow-right"></i></a></li>
                    @else
                    <li><a ><i class="sl sl-icon-arrow-right"></i></a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <!-- Pagination / End -->
@endif


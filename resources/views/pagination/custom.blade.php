@if ($paginator->hasPages())
    <div class="mt-12 flex justify-center">
        <ul class="flex space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="w-10 h-10 flex items-center justify-center border rounded text-gray-300 cursor-not-allowed">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center border rounded hover:bg-primary hover:text-white transition">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="w-10 h-10 flex items-center justify-center border rounded text-gray-400">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="w-10 h-10 flex items-center justify-center border rounded bg-primary text-white shadow font-semibold">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="w-10 h-10 flex items-center justify-center border rounded hover:bg-primary hover:text-white transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center border rounded hover:bg-primary hover:text-white transition">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            @else
                <li>
                    <span class="w-10 h-10 flex items-center justify-center border rounded text-gray-300 cursor-not-allowed">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </div>
@endif

@if ($paginator->hasPages())
    <nav class="flex justify-center space-x-2" role="navigation">
        {{-- Previous Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-800 text-gray-500 rounded-l-xl cursor-not-allowed">Anterior</span>
        @else
            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="px-4 py-2 bg-gray-700 text-white rounded-l-xl hover:bg-amber-500 hover:text-gray-900 transition-all duration-300"
            >
                Anterior
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 bg-gray-800 text-gray-500 cursor-default">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl shadow-md shadow-amber-500/30"
                        >
                            {{ $page }}
                        </span>
                    @else
                        <a
                            href="{{ $url }}"
                            class="px-4 py-2 bg-gray-700 text-white rounded-xl hover:bg-gradient-to-r hover:from-amber-500 hover:to-yellow-500 hover:text-gray-900 transition-all duration-300"
                        >
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Link --}}

        @if ($paginator->hasMorePages())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="px-4 py-2 bg-gray-700 text-white rounded-r-xl hover:bg-amber-500 hover:text-gray-900 transition-all duration-300"
            >
                Próximo
            </a>
        @else
            <span class="px-4 py-2 bg-gray-800 text-gray-500 rounded-r-xl cursor-not-allowed">Próximo</span>
        @endif
    </nav>
@endif

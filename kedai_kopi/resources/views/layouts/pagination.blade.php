@if ($paginator->hasPages())
    <div class="flex items-center justify-between px-6 py-4 bg-white border-t border-[#E8D8C4]">
        <div class="text-sm text-[#8B6E54]">
            Menampilkan
            <span class="font-semibold">{{ $paginator->firstItem() ?? 0 }}</span>
            ke
            <span class="font-semibold">{{ $paginator->lastItem() ?? 0 }}</span>
            dari
            <span class="font-semibold">{{ $paginator->total() }}</span>
            data
        </div>

        <nav class="flex items-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button disabled
                    class="px-3 py-2 rounded-lg text-[#8B6E54] bg-[#FAF3E0] opacity-50 cursor-not-allowed">
                    ← Sebelumnya
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-2 rounded-lg text-[#6F4E37] bg-[#FAF3E0] hover:bg-[#F0E5D8] transition cursor-pointer font-medium">
                    ← Sebelumnya
                </a>
            @endif

            {{-- Pagination Elements --}}
            <div class="flex gap-1">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="px-3 py-2 text-[#8B6E54]">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <button disabled
                                    class="px-3 py-2 rounded-lg bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white font-semibold cursor-default">
                                    {{ $page }}
                                </button>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 rounded-lg text-[#6F4E37] bg-white border border-[#E6D7C8] hover:bg-[#FAF3E0] transition cursor-pointer font-medium">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-3 py-2 rounded-lg text-[#6F4E37] bg-[#FAF3E0] hover:bg-[#F0E5D8] transition cursor-pointer font-medium">
                    Berikutnya →
                </a>
            @else
                <button disabled
                    class="px-3 py-2 rounded-lg text-[#8B6E54] bg-[#FAF3E0] opacity-50 cursor-not-allowed">
                    Berikutnya →
                </button>
            @endif
        </nav>
    </div>
@endif

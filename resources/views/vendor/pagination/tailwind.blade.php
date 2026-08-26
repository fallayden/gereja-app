@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between w-full">
        {{-- Mobile View --}}
        <div class="flex items-center justify-between w-full sm:hidden">
            <div>
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 rounded-md hover:bg-slate-50 transition ease-in-out duration-150 shadow-sm">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif
            </div>

            <div>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 rounded-md hover:bg-slate-50 transition ease-in-out duration-150 shadow-sm">
                        {!! __('pagination.next') !!}
                    </a>
                @endif
            </div>
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-slate-600 leading-5">
                    Menampilkan
                    @if ($paginator->firstItem())
                        <span class="font-medium text-slate-900">{{ $paginator->firstItem() }}</span>
                        sampai
                        <span class="font-medium text-slate-900">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    dari
                    <span class="font-medium text-slate-900">{{ $paginator->total() }}</span>
                    hasil
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if (!$paginator->onFirstPage())
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-l-md leading-5 hover:bg-slate-50 hover:text-slate-900 focus:z-10 focus:outline-none transition ease-in-out duration-150 gap-1.5" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-xs font-semibold">Sebelumnya</span>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-slate-400 bg-white border border-slate-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @php
                                    $isFirstElementInBar = $loop->first && $paginator->onFirstPage();
                                    $isLastElementInBar = $loop->last && !$paginator->hasMorePages();
                                    $roundedClass = '';
                                    if ($isFirstElementInBar && $isLastElementInBar) {
                                        $roundedClass = 'rounded-md';
                                    } elseif ($isFirstElementInBar) {
                                        $roundedClass = 'rounded-l-md';
                                    } elseif ($isLastElementInBar) {
                                        $roundedClass = 'rounded-r-md';
                                    }
                                @endphp

                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-semibold text-white bg-primary border border-primary cursor-default leading-5 {{ $roundedClass }}">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-slate-700 bg-white border border-slate-300 leading-5 hover:bg-slate-50 hover:text-slate-900 focus:z-10 focus:outline-none transition ease-in-out duration-150 {{ $roundedClass }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-r-md leading-5 hover:bg-slate-50 hover:text-slate-900 focus:z-10 focus:outline-none transition ease-in-out duration-150 gap-1.5" aria-label="{{ __('pagination.next') }}">
                            <span class="text-xs font-semibold">Berikutnya</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif

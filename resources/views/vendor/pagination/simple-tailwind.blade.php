@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between w-full">
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
    </nav>
@endif

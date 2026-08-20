@props([
    'fileName',
    'date',
    'downloadUrl',
    'viewUrl' => null,
])

@php
    $viewTarget = $viewUrl ?? $downloadUrl;
@endphp

<div class="p-4 rounded-lg bg-surface border border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 shadow-sm hover:border-slate-300 transition">
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-lg bg-red-50 text-tertiary flex items-center justify-center flex-shrink-0 font-bold text-xs">
            PDF
        </div>
        <div>
            <h4 class="font-semibold text-sm text-primary">
                {{ $fileName }}
            </h4>
            <span class="text-xs text-slate-400">
                Edisi: {{ $date }}
            </span>
        </div>
    </div>

    <div class="flex items-center space-x-2">
        <a href="{{ $viewTarget }}" target="_blank" class="px-3 py-1.5 rounded text-xs font-medium bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
            Baca PDF
        </a>
        <a href="{{ $downloadUrl }}" download class="px-3 py-1.5 rounded text-xs font-medium bg-tertiary text-white hover:bg-red-700 transition">
            Download PDF
        </a>
    </div>
</div>

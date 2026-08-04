@props([
    'name',
    'day',
    'startTime',
    'endTime',
    'location' => null,
    'note' => null,
])

@php
    // Format start and end time if needed (e.g. 09:30:00 -> 09:30)
    $formattedStart = \Illuminate\Support\Str::of($startTime)->beforeLast(':');
    $formattedEnd = \Illuminate\Support\Str::of($endTime)->beforeLast(':');
@endphp

<x-card class="hover:shadow-lg transition-all duration-300 border-t-4 border-t-tertiary flex flex-col justify-between h-full">
    <div>
        <div class="flex items-center justify-between mb-3">
            <span class="inline-block px-3 py-1 bg-red-50 text-tertiary text-xs font-semibold rounded-full uppercase tracking-wider">
                {{ $day }}
            </span>
            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <h3 class="font-display font-bold text-lg text-primary mb-2">
            {{ $name }}
        </h3>

        <div class="flex items-center text-slate-700 text-sm font-semibold mb-3">
            <span class="text-slate-500 text-xs uppercase tracking-wider mr-2">Waktu:</span>
            <span>{{ $formattedStart }} - {{ $formattedEnd }} WIB</span>
        </div>

        @if($location)
            <div class="flex items-start text-xs text-secondary mb-2">
                <span class="text-slate-400 mr-1">Lokasi:</span>
                <span>{{ $location }}</span>
            </div>
        @endif

        @if($note)
            <p class="text-xs text-slate-500 italic mt-2 pt-2 border-t border-slate-100">
                * {{ $note }}
            </p>
        @endif
    </div>
</x-card>

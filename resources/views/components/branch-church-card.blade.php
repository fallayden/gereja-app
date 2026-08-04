@props([
    'name',
    'pastorName',
    'photo' => null,
    'address' => null,
])

<x-card padding="p-0" class="overflow-hidden hover:shadow-lg transition flex flex-col h-full">
    <div class="h-44 bg-slate-200 relative flex items-center justify-center text-slate-400">
        @if($photo)
            <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name }}" class="w-full h-full object-cover">
        @else
            <div class="text-center p-4">
                <svg class="w-12 h-12 mx-auto mb-1 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0v-5a2 2 0 012-2h2a2 2 0 012 2v5m-6 0h6" />
                </svg>
                <span class="text-xs text-slate-400 font-medium">Foto Lokasi Belum Tersedia</span>
            </div>
        @endif
    </div>

    <div class="p-5 flex flex-col justify-between flex-grow">
        <div>
            <h3 class="font-display font-bold text-lg text-primary mb-1">
                {{ $name }}
            </h3>
            <p class="text-xs font-semibold text-tertiary uppercase tracking-wider mb-3">
                Penanggung Jawab: {{ $pastorName }}
            </p>

            @if($address)
                <p class="text-xs text-secondary leading-relaxed flex items-start">
                    <span class="mr-1">📍</span>
                    <span>{{ $address }}</span>
                </p>
            @endif
        </div>
    </div>
</x-card>

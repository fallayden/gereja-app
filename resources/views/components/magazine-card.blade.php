@props([
    'title',
    'edition',
    'coverPath' => null,
    'downloadUrl' => null,
])

<x-card padding="p-0" class="overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col h-full">
    <!-- Cover Container (Aspect Ratio 3:4 Potret) -->
    <div class="aspect-[3/4] bg-slate-200 relative overflow-hidden flex items-center justify-center">
        @if($coverPath)
            <img src="{{ asset('storage/' . $coverPath) }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
        @else
            <div class="p-6 text-center text-slate-400 flex flex-col items-center justify-center h-full w-full bg-gradient-to-b from-blue-900 to-primary text-white">
                <svg class="w-12 h-12 mb-2 text-tertiary" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L1 21h22L12 2zm0 3.5L19.5 19h-15L12 5.5z"/>
                </svg>
                <span class="font-display font-bold text-lg text-white mb-1">PEDANG ROH</span>
                <span class="text-xs text-blue-200">Edisi {{ $edition }}</span>
            </div>
        @endif

        <!-- Overlay Tag -->
        <div class="absolute top-3 left-3 bg-primary/90 text-white text-[10px] font-bold px-2.5 py-1 rounded shadow uppercase tracking-wider backdrop-blur-sm">
            Edisi {{ $edition }}
        </div>
    </div>

    <!-- Info & Download Button -->
    <div class="p-4 flex flex-col justify-between flex-grow">
        <div>
            <h4 class="font-display font-bold text-base text-primary group-hover:text-tertiary transition mb-1 line-clamp-1">
                {{ $title }}
            </h4>
        </div>

        <div class="mt-3 pt-3 border-t border-slate-100">
            @if($downloadUrl)
                <a href="{{ $downloadUrl }}" download class="w-full inline-flex items-center justify-center px-4 py-2 rounded-md bg-tertiary text-white text-xs font-semibold hover:bg-red-700 transition shadow-sm">
                    Unduh Majalah (PDF)
                </a>
            @else
                <span class="w-full inline-flex items-center justify-center px-4 py-2 rounded-md bg-slate-200 text-slate-500 text-xs font-semibold">
                    PDF Belum Tersedia
                </span>
            @endif
        </div>
    </div>
</x-card>

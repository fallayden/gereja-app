@props([
    'title',
    'excerpt',
    'thumbnail' => null,
    'date',
    'url',
])

<x-card padding="p-0" class="overflow-hidden hover:shadow-lg transition group">
    <div class="flex flex-col sm:flex-row">
        <!-- Thumbnail (Ukuran & Proporsi Konsisten 100%) -->
        <div class="w-full sm:w-56 md:w-64 h-48 sm:h-52 shrink-0 bg-slate-100 overflow-hidden relative">
            @if($thumbnail)
                <img src="{{ asset('storage/' . $thumbnail) }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
            @else
                <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-200">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 002-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            @endif
        </div>

        <!-- Content -->
        <div class="p-6 flex flex-col justify-between flex-grow">
            <div>
                <span class="inline-block text-xs font-semibold text-tertiary uppercase tracking-wider mb-2">
                    {{ $date }}
                </span>
                <h3 class="font-display font-bold text-xl text-primary group-hover:text-tertiary transition mb-2">
                    <a href="{{ $url }}">
                        {{ $title }}
                    </a>
                </h3>
                <p class="text-secondary text-sm line-clamp-3 leading-relaxed mb-4">
                    {{ $excerpt }}
                </p>
            </div>

            <div>
                <a href="{{ $url }}" class="inline-flex items-center text-xs font-semibold text-primary hover:text-tertiary transition">
                    Baca Selengkapnya &rarr;
                </a>
            </div>
        </div>
    </div>
</x-card>

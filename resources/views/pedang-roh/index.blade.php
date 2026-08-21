<x-app-layout title="Majalah Pedang Roh — GBIA GRAMMATA">

    <!-- Hero Header Banner -->
    <section class="relative text-white py-14 md:py-20 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
        <!-- Foto Background Pedang Roh (dengan Overlay Biru-Navy) -->
        <div class="absolute inset-0 z-0">
            @if(file_exists(public_path('images/foto-pedang-roh.jpg')))
                <img src="{{ asset('images/foto-pedang-roh.jpg') }}" alt="Majalah Pedang Roh GBIA Grammata" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0" style="background-color: rgba(15, 30, 60, 0.85);"></div>
            @else
                <div class="w-full h-full bg-gradient-to-b from-primary to-blue-950"></div>
            @endif
        </div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <span class="inline-block px-3 py-1 rounded-full text-blue-200 text-xs font-semibold uppercase tracking-widest mb-3 border border-white/20" style="background-color: rgba(255, 255, 255, 0.15);">
                Publikasi Berkala
            </span>
            <h1 class="font-display font-bold text-3xl sm:text-4xl text-white mb-3">
                Majalah Pedang Roh
            </h1>
        </div>
    </section>

    <!-- Filter Bar & Search Section -->
    <section class="bg-slate-100 border-b border-slate-200 py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <form method="GET" action="{{ route('pedang-roh.index') }}" class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                    <!-- Search Input -->
                    <div class="relative w-full sm:w-72">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari judul / nomor edisi..."
                               class="w-full pl-9 pr-4 py-2 text-sm bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <span class="absolute left-3 top-3 text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </span>
                    </div>

                    <!-- Year Filter Dropdown -->
                    <select name="year" class="w-full sm:w-40 py-2 px-3 text-sm bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Semua Tahun</option>
                        @foreach($availableYears as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                Tahun {{ $year }}
                            </option>
                        @endforeach
                    </select>

                    <x-button type="submit" variant="secondary" class="w-full sm:w-auto text-xs py-2">
                        Filter
                    </x-button>
                </div>

                @if(request('search') || request('year'))
                    <a href="{{ route('pedang-roh.index') }}" class="text-xs text-tertiary font-semibold hover:underline">
                        ✕ Hapus Filter
                    </a>
                @endif
            </form>
        </div>
    </section>

    <!-- Magazine Catalog Grid -->
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($magazines as $magazine)
                <div class="flex flex-col h-full">
                    <x-magazine-card
                        :title="$magazine->title"
                        :edition="$magazine->edition_number"
                        :coverPath="$magazine->cover_image"
                        :downloadUrl="$magazine->pdf_file ? route('pedang-roh.download', $magazine) : null"
                    />
                    <!-- Direct View Online Option -->
                    @if($magazine->pdf_file)
                        <div class="mt-2 text-center">
                            <a href="{{ route('pedang-roh.view', $magazine) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-xs font-semibold text-primary hover:text-tertiary transition">
                                Baca PDF Online
                            </a>
                        </div>
                    @endif
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-lg border border-slate-200">
                    <h3 class="font-display font-bold text-lg text-primary mb-2">Tidak Ada Majalah Ditemukan</h3>
                    <p class="text-secondary text-sm">Tidak ada edisi majalah Pedang Roh yang cocok dengan kriteria pencarian Anda.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $magazines->links() }}
        </div>
    </section>

</x-app-layout>

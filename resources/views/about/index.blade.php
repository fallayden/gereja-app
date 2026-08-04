<x-app-layout title="Tentang Kami — GBIA GRAMMATA">

    <!-- Hero Header Banner -->
    <section class="bg-gradient-to-b from-primary to-blue-950 text-white py-16 md:py-20 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-white/5 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px] opacity-30"></div>
        <div class="relative max-w-4xl mx-auto">
            <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-blue-200 text-xs font-semibold uppercase tracking-widest mb-3 border border-white/15">
                Profil Gereja
            </span>
            <h1 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl text-white mb-4">
                Mengenal GBIA GRAMMATA
            </h1>
            <p class="font-body text-blue-100 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                Tiang penopang dan dasar kebenaran di Serpong, Tangerang. Berpusat pada Kristus dan berorientasi pada keluarga.
            </p>
        </div>
    </section>

    <!-- Section 1: Kata Sambutan Gembala (Split-Screen) -->
    <section class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Foto Gembala (Left Column) -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative w-full max-w-md">
                    <div class="aspect-[4/5] rounded-2xl bg-slate-200 overflow-hidden shadow-xl border-4 border-white relative flex items-center justify-center">
                        @if($pastor && $pastor->photo)
                            <img src="{{ asset('storage/' . $pastor->photo) }}" alt="{{ $pastor->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="p-8 text-center text-slate-400">
                                <svg class="w-20 h-20 mx-auto mb-3 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="font-display font-bold text-slate-500 block text-lg mb-1">{{ $pastor->name ?? 'Gbl. Arifan T. Kusuma' }}</span>
                                <span class="text-xs text-slate-400">Foto Gembala & Keluarga</span>
                            </div>
                        @endif
                    </div>
                    <!-- Decorative Badge -->
                    <div class="absolute -bottom-4 -right-4 bg-tertiary text-white px-5 py-2.5 rounded-xl shadow-lg font-display text-xs font-bold tracking-wider">
                        Gembala Jemaat
                    </div>
                </div>
            </div>

            <!-- Teks Sambutan (Right Column) -->
            <div class="lg:col-span-7">
                <div class="inline-block px-3 py-1 bg-red-50 text-tertiary text-xs font-semibold rounded-full uppercase tracking-wider mb-3">
                    Kata Sambutan Gembala
                </div>
                <h2 class="font-display font-bold text-2xl md:text-3xl text-primary mb-6">
                    Selamat Datang di GBIA GRAMMATA
                </h2>

                @if($pastor && $pastor->greeting)
                    <div class="font-display text-secondary text-base md:text-lg leading-relaxed space-y-4 italic">
                        @foreach(explode("\n\n", $pastor->greeting) as $paragraph)
                            <p class="not-italic font-normal text-slate-700 text-sm md:text-base leading-relaxed">
                                "{{ $paragraph }}"
                            </p>
                        @endforeach
                    </div>
                @endif

                <div class="mt-8 pt-6 border-t border-slate-200 flex items-center justify-between">
                    <div>
                        <h4 class="font-display font-bold text-primary text-base md:text-lg">
                            {{ $pastor->name ?? 'Gbl. Arifan T. Kusuma' }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Sejarah Singkat (Vertical Timeline) -->
    <section class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-slate-100/70 border-y border-slate-200">
        <div class="max-w-5xl mx-auto">
            <x-section-heading
                title="Perjalanan Sejarah Gereja"
                subtitle="Jejak langkah penyertaan Tuhan bagi GBIA GRAMMATA dari awal berdirinya hingga saat ini"
                centered="true"
            />

            <div class="relative mt-12">
                <!-- Vertical Line (Desktop Center) -->
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 bg-slate-300 -translate-x-1/2"></div>

                <!-- Timeline Items -->
                <div class="space-y-6">
                    @foreach($histories as $index => $history)
                        <x-timeline-item
                            :year="$history->year"
                            :title="$history->title"
                            :description="$history->description"
                            :position="$index % 2 == 0 ? 'left' : 'right'"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Tunas Jemaat (3 Lokasi) -->
    <section class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-heading
            title="Tunas Jemaat"
            subtitle="Pos pelayanan dan ladang pelayanan yang dinaungi GBIA GRAMMATA"
            centered="true"
        />

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
            @foreach($branches as $branch)
                <x-branch-church-card
                    :name="$branch->name"
                    :pastorName="$branch->pastor_name"
                    :photo="$branch->photo"
                    :address="$branch->address"
                />
            @endforeach
        </div>
    </section>

    <!-- Section 4: Pengakuan Iman (31 Butir Accordion) -->
    <section class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-slate-100/70 border-t border-slate-200">
        <div class="max-w-4xl mx-auto">
            <x-section-heading
                title="Pengakuan Iman"
                centered="true"
            />

            <div class="mt-10">
                @foreach($creeds as $creed)
                    <x-accordion
                        :number="$creed->number"
                        :title="$creed->title"
                        :open="$loop->first"
                    >
                        <p class="text-slate-700 text-sm md:text-base leading-relaxed">
                            {{ $creed->content }}
                        </p>
                    </x-accordion>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>

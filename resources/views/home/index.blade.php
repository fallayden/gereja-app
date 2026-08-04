<x-app-layout title="Beranda — GBIA GRAMMATA">

    <!-- Hero Banner Section -->
    <section class="relative bg-gradient-to-b from-primary to-blue-950 text-white py-20 md:py-28 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute inset-0 bg-white/5 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px] opacity-30"></div>
        <div class="relative max-w-5xl mx-auto text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 text-blue-200 text-xs font-semibold uppercase tracking-widest mb-4 border border-white/15">
                Gereja Alkitabiah Serpong, Tangerang
            </span>
            <h1 class="font-display font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl tracking-tight text-white leading-tight mb-6">
                Selamat Datang di <span class="text-blue-200">GBIA GRAMMATA</span>
            </h1>
            <p class="font-body text-blue-100 text-base sm:text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-8">
                Menjadi tiang penopang dan dasar kebenaran di daerah Serpong, mempersiapkan umat yang mengasihi, bertumbuh, dan melayani Tuhan.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <x-button href="#jadwal" variant="primary" class="w-full sm:w-auto px-8 py-3.5 shadow-lg">
                    🕒 lihat Jadwal Ibadah
                </x-button>
                <x-button :href="route('about')" variant="outline" class="w-full sm:w-auto px-8 py-3.5 border-white/40 text-white hover:bg-white/10 hover:text-white">
                    📖 Tentang Gereja Kami
                </x-button>
            </div>
        </div>
    </section>

    <!-- Section 1: Jadwal Ibadah -->
    <section id="jadwal" class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-heading
            title="Jadwal Ibadah & Persekutuan"
            subtitle="Mari bergabung dan beribadah bersama jemaat GBIA GRAMMATA"
            centered="true"
        />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($schedules as $schedule)
                <x-schedule-card
                    :name="$schedule->name"
                    :day="$schedule->day"
                    :startTime="$schedule->start_time"
                    :endTime="$schedule->end_time"
                    :location="$schedule->location"
                    :note="$schedule->note"
                />
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-lg border border-slate-200">
                    <p class="text-secondary text-sm">Belum ada jadwal ibadah yang dikonfigurasi.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Section 2: Visi, Misi & Tentang -->
    <section class="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-slate-100/70 border-y border-slate-200">
        <div class="max-w-7xl mx-auto">
            <x-section-heading
                title="Mengenal GBIA GRAMMATA"
                subtitle="Prinsip, komitmen, dan tujuan pelayanan gereja kami"
                centered="true"
            />

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Visi Card -->
                <x-visi-misi-card title="Visi Kami">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </x-slot:icon>
                    Hadir untuk menjadi terang dunia dan tiang penopang dasar kebenaran, mempersiapkan umat yg mengasihi, bertumbuh, dan melayani TUHAN.
                </x-visi-misi-card>

                <!-- Misi Card -->
                <x-visi-misi-card title="Misi Kami">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </x-slot:icon>
                    Menjangkau melalui internet, memfasilitasi untuk memenuhi kebutuhan umat TUHAN melalui internet.
                </x-visi-misi-card>

                <!-- Tentang Card (dengan tombol "Baca Selengkapnya") -->
                <x-visi-misi-card
                    title="Tentang Gereja"
                    :action="route('about')"
                    actionText="Baca Selengkapnya"
                >
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </x-slot:icon>
                    Kata ‘grammata’ sendiri adalah berarti Kitab Suci (2 Tim 3:15). Kami hadir untuk Anda di daerah Serpong, Tangerang sebagai tiang penopang dan dasar kebenaran di daerah Serpong sana.
                </x-visi-misi-card>
            </div>
        </div>
    </section>

    <!-- Section 3: Call to Action (CTA) -->
    <x-cta-section
        headline="Mari Bertumbuh dan Beribadah Bersama Kami!"
        buttonText="Temukan Kami"
        buttonUrl="#lokasi"
    />

    <!-- Section 4: Google Maps Embed -->
    <x-google-map height="450px" />

</x-app-layout>

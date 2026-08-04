<x-app-layout title="Tentang — GBIA GRAMMATA">
    <header class="relative overflow-hidden bg-gradient-to-br from-primary via-blue-900 to-blue-950 px-4 py-16 text-white sm:px-6 md:py-20 lg:px-8">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.14),transparent_42%)]"></div>
        <div class="relative mx-auto max-w-7xl">
            <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-blue-200">Profil Gereja</p>
            <h1 class="max-w-3xl font-display text-3xl font-bold leading-tight sm:text-4xl md:text-5xl">Mengenal GBIA GRAMMATA</h1>
            <p class="mt-4 max-w-2xl text-sm leading-relaxed text-blue-100 sm:text-base">Perjalanan iman, pelayanan, dan dasar kepercayaan yang membentuk keluarga rohani kami.</p>
        </div>
    </header>

    <section class="px-4 py-16 sm:px-6 md:py-24 lg:px-8" aria-labelledby="pastor-greeting">
        <div class="mx-auto grid max-w-7xl items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div class="relative mx-auto w-full max-w-lg lg:mx-0">
                <div class="absolute -inset-3 -z-10 rounded-3xl bg-blue-100/70"></div>
                <div class="aspect-[4/3] overflow-hidden rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 shadow-xl ring-1 ring-slate-200">
                    @if($pastor?->photo)
                        <img src="{{ asset('storage/' . $pastor->photo) }}" alt="Keluarga {{ $pastor->name }}" class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full flex-col items-center justify-center px-6 text-center text-slate-400">
                            <svg class="mb-4 h-20 w-20 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m19 0v-2a4 4 0 00-3-3.87M13 3.13a4 4 0 010 7.75M9 11a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                            <span class="text-sm font-medium">Foto keluarga gembala akan segera hadir</span>
                        </div>
                    @endif
                </div>
            </div>

            <div>
                <x-section-heading title="Kata Sambutan Gembala" />
                @if($pastor)
                    <div id="pastor-greeting" class="space-y-5 font-display text-sm leading-8 text-secondary sm:text-base">
                        @foreach(preg_split('/\R{2,}/', trim($pastor->greeting)) as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                    <div class="mt-7 border-l-4 border-tertiary pl-4">
                        <p class="font-display font-bold text-primary">{{ $pastor->name }}</p>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-wider text-secondary">{{ $pastor->title }}</p>
                    </div>
                @else
                    <p id="pastor-greeting" class="text-secondary">Profil gembala belum tersedia.</p>
                @endif
            </div>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-slate-100/70 px-4 py-16 sm:px-6 md:py-24 lg:px-8" aria-labelledby="history-heading">
        <div class="mx-auto max-w-5xl">
            <div id="history-heading"><x-section-heading title="Perjalanan Iman Kami" centered="true" /></div>
            <div class="relative mt-12 md:mt-16">
                <div class="absolute bottom-0 left-5 top-0 block w-px bg-blue-200 md:left-1/2 md:-translate-x-1/2" aria-hidden="true"></div>
                @forelse($histories as $history)
                    <x-timeline-item
                        :year="$history->year"
                        :title="$history->title"
                        :description="$history->description"
                        :position="$loop->even ? 'right' : 'left'"
                    />
                @empty
                    <p class="text-center text-secondary">Riwayat gereja belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="px-4 py-16 sm:px-6 md:py-24 lg:px-8" aria-labelledby="branches-heading">
        <div class="mx-auto max-w-7xl">
            <div id="branches-heading"><x-section-heading title="Tunas Jemaat" centered="true" /></div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @forelse($branches as $branch)
                    <x-branch-church-card
                        :name="$branch->name"
                        :pastorName="$branch->pastor_name"
                        :photo="$branch->photo"
                        :address="$branch->address"
                    />
                @empty
                    <p class="col-span-full text-center text-secondary">Data tunas jemaat belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="border-t border-slate-200 bg-white px-4 py-16 sm:px-6 md:py-24 lg:px-8" aria-labelledby="creed-heading">
        <div class="mx-auto max-w-4xl">
            <div id="creed-heading">
                <x-section-heading title="Pengakuan Iman" subtitle="Gereja Baptis Independen Alkitabiah GRAMMATA" centered="true" />
            </div>
            <div class="mt-10">
                @forelse($creeds as $creed)
                    <x-accordion :title="$creed->title" :number="$creed->number">
                        <p class="pt-4">{{ $creed->content }}</p>
                    </x-accordion>
                @empty
                    <p class="text-center text-secondary">Pengakuan iman belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>

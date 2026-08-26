<x-app-layout title="Warta Jemaat — GBIA GRAMMATA">

    <!-- Hero Header Banner -->
    <section class="relative text-white py-14 md:py-20 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
        <!-- Foto Background Warta (dengan Overlay Biru-Navy) -->
        <div class="absolute inset-0 z-0">
            @if(file_exists(public_path('images/foto-warta.jpg')))
                <img src="{{ asset('images/foto-warta.jpg') }}" alt="Warta Jemaat GBIA Grammata" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0" style="background-color: rgba(15, 30, 60, 0.85);"></div>
            @elseif(file_exists(public_path('images/foto-warta.jpeg')))
                <img src="{{ asset('images/foto-warta.jpeg') }}" alt="Warta Jemaat GBIA Grammata" class="w-full h-full object-cover object-center">
                <div class="absolute inset-0" style="background-color: rgba(15, 30, 60, 0.85);"></div>
            @else
                <div class="w-full h-full bg-gradient-to-b from-primary to-blue-950"></div>
            @endif
        </div>

        <div class="relative z-10 max-w-4xl mx-auto">
            <span class="inline-block px-3 py-1 rounded-full text-blue-200 text-xs font-semibold uppercase tracking-widest mb-3 border border-white/20" style="background-color: rgba(255, 255, 255, 0.15);">
                Warta Jemaat
            </span>
            <h1 class="font-display font-bold text-3xl sm:text-4xl text-white mb-3">
                Warta Jemaat GBIA GRAMMATA
            </h1>
            <p class="font-body text-blue-100 text-base max-w-2xl mx-auto leading-relaxed">
                Artikel kekristenan, rangkuman khotbah, dan buletin mingguan gereja.
            </p>
        </div>
    </section>

    <!-- Main Content: 70% Article List + 30% Sidebar -->
    <section class="py-12 md:py-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Left: Article List (8 cols ≈ 70%) -->
            <div class="lg:col-span-8 space-y-6">
                @forelse($articles as $article)
                    <a href="{{ route('warta.show', $article->slug) }}" class="block group">
                        <x-article-card
                            :title="$article->title"
                            :excerpt="$article->excerpt ?? Str::limit(strip_tags($article->body), 160)"
                            :thumbnail="$article->thumbnail"
                            :date="$article->published_at->translatedFormat('d F Y')"
                            :url="route('warta.show', $article->slug)"
                        />
                    </a>
                @empty
                    <div class="text-center py-16 bg-white rounded-lg border border-slate-200">
                        <h3 class="font-display font-bold text-lg text-primary mb-2">Belum Ada Artikel</h3>
                        <p class="text-secondary text-sm">Artikel warta jemaat akan ditampilkan di sini setelah diunggah melalui panel admin.</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $articles->links() }}
                </div>
            </div>

            <!-- Right: Sidebar Arsip Warta (4 cols ≈ 30%) -->
            <aside class="lg:col-span-4">
                <div class="sticky top-24">
                    <div class="bg-surface rounded-lg border border-slate-200 shadow-sm p-6">
                        <h3 class="font-display font-bold text-lg text-primary mb-1">Arsip Warta</h3>
                        <p class="text-xs text-secondary mb-5">Buletin mingguan terbaru dalam format PDF.</p>
                        <div class="border-t border-slate-100 pt-4 space-y-4">
                            @forelse($archives as $archive)
                                @php
                                    $attachment = $archive->attachments->first();
                                @endphp
                                @if($attachment)
                                    <x-archive-item
                                        :fileName="$attachment->file_name ?: $archive->title"
                                        :downloadUrl="route('warta.download-attachment', $attachment)"
                                        :viewUrl="route('warta.view-attachment', $attachment)"
                                    />
                                @endif
                            @empty
                                <p class="text-xs text-slate-400 text-center py-4">Belum ada arsip warta.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </section>

</x-app-layout>

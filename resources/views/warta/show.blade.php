<x-app-layout :title="$article->title . ' — Warta Jemaat GBIA GRAMMATA'">

    <!-- Back Navigation -->
    <div class="bg-slate-100 border-b border-slate-200 py-3 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('warta.index') }}" class="inline-flex items-center text-sm font-medium text-primary hover:text-tertiary transition">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Warta Jemaat
            </a>
        </div>
    </div>

    <!-- Main Content: 70% Article + 30% Sidebar -->
    <section class="py-10 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <!-- Left: Article Detail (8 cols ≈ 70%) -->
            <article class="lg:col-span-8">
                <!-- Date Label -->
                <span class="inline-block text-sm font-semibold text-tertiary uppercase tracking-wider mb-3">
                    {{ $article->published_at->translatedFormat('d F Y') }}
                </span>

                <!-- Title -->
                <h1 class="font-display font-bold text-2xl sm:text-3xl md:text-4xl text-primary leading-tight mb-6">
                    {{ $article->title }}
                </h1>

                <!-- Thumbnail (full-width) -->
                @if($article->thumbnail)
                    <div class="mb-8 rounded-xl overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-auto object-cover max-h-[480px]">
                    </div>
                @endif

                <!-- Article Body (Prose Typography) -->
                <div class="prose prose-slate max-w-none
                            prose-headings:font-display prose-headings:text-primary
                            prose-p:text-slate-700 prose-p:leading-relaxed
                            prose-a:text-tertiary prose-a:font-medium hover:prose-a:underline
                            prose-strong:text-primary
                            prose-li:text-slate-700
                            prose-blockquote:border-l-tertiary prose-blockquote:text-slate-600 prose-blockquote:italic
                            prose-img:rounded-lg prose-img:shadow-md">
                    {!! $article->body !!}
                </div>

                <!-- PDF Attachment (if available) -->
                @if($article->attachments->isNotEmpty())
                    <div class="mt-10 pt-8 border-t border-slate-200">
                        <h3 class="font-display font-bold text-lg text-primary mb-4">Buletin PDF Terkait</h3>
                        <div class="space-y-3">
                            @foreach($article->attachments as $attachment)
                                <x-archive-item
                                    :fileName="$attachment->file_name ?: basename($attachment->file_path)"
                                    :downloadUrl="route('warta.download-attachment', $attachment)"
                                    :viewUrl="route('warta.view-attachment', $attachment)"
                                />
                            @endforeach
                        </div>
                    </div>
                @endif
            </article>

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

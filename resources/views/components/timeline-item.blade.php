@props([
    'year',
    'title',
    'description',
    'position' => 'left',
])

<div class="group relative mb-8 flex items-center justify-between border-b border-slate-200 pb-8 pl-14 md:mb-12 md:border-b-0 md:pb-0 md:pl-0 {{ $position === 'right' ? 'md:flex-row-reverse' : 'md:flex-row' }}">
    <!-- Center Dot -->
    <div class="absolute left-0 z-10 flex h-10 w-10 items-center justify-center rounded-full border-4 border-white bg-primary text-xs font-bold text-white shadow-md md:left-1/2 md:-translate-x-1/2">
        {{ $year }}
    </div>

    <!-- Content Card -->
    <div class="w-full md:w-[calc(50%-2.5rem)]">
        <x-card class="hover:shadow-lg transition">
            <h3 class="font-display font-bold text-lg text-primary mb-2">
                {{ $title }}
            </h3>
            <p class="text-secondary text-sm leading-relaxed">
                {{ $description }}
            </p>
        </x-card>
    </div>
</div>
